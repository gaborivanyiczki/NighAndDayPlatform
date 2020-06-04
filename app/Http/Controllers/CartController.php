<?php

namespace App\Http\Controllers;

use App\GlobalSettings;
use App\Order;
use App\OrderItem;
use App\PaymentType;
use App\Repository\Eloquent\ProductsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Repository\Eloquent\AddressTypeRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\UserAddress;
use App\UserVoucher;
use App\Voucher;

class CartController extends Controller
{
    protected $productRepo;
    protected $userAddressRepo;
    protected $addressTypeRepo;

    public function __construct(ProductsRepository $productRepository,UserAddressRepository $userAddressRepository, AddressTypeRepository $addressTypeRepository)
    {
        $this->productRepo = $productRepository;
        $this->userAddressRepo = $userAddressRepository;
        $this->addressTypeRepo = $addressTypeRepository;
    }

    public function cart()
    {
        $cartCollection = null;
        $cartTotal = null;
        //\Cart::clear();
        if (Auth::check())
        {
            $userId = Auth::id();
            $cartCollection = \Cart::session($userId)->getContent();
            $cartTotal = \Cart::session($userId)->getTotal();
        }
        else
        {
            $cartCollection = \Cart::getContent();
            $cartTotal = \Cart::getTotal();
        }

        return view('cart.cart', compact('cartTotal'))->with('cartModel', json_encode($cartCollection));
    }

    public function checkout()
    {
        if (Auth::check()) {
            $cartCollection = null;
            $cartTotal = null;

            $userId = Auth::id();
            $cartCollection = \Cart::session($userId)->getContent();
            $cartTotal = \Cart::session($userId)->getTotal();
            $invoiceAddresses = json_encode($this->userAddressRepo->getInvoiceAddresses(Auth::id()));
            $deliveryAddresses = json_encode($this->userAddressRepo->getDeliveryAddresses(Auth::id()));
            $availableAddressTypes =  $this->addressTypeRepo->getAvailableAddressTypes(Auth::id());
            $invoiceAddressAvailable = 0;
            $deliveryAddressAvailable = 0;
            $deliveryFee = GlobalSettings::where([['Filter', 'delivery'], ['Code','delivery_charge']])->first()->Value;

            foreach ($availableAddressTypes as $item) {
                if($item['AddressType'] == 1)
                {
                   $invoiceAddressAvailable++;
                }
                else
                {
                    $deliveryAddressAvailable++;
                }
            }

            $availableAddressTypes =  json_encode($availableAddressTypes);

            return view('cart.checkout', compact('cartTotal'))->with('cartModel', json_encode($cartCollection))
                                                                ->with('invoiceAddresses', json_decode($invoiceAddresses))
                                                                ->with('deliveryAddresses', json_decode($deliveryAddresses))
                                                                ->with('invoiceAddressAvailable', json_decode($invoiceAddressAvailable))
                                                                ->with('deliveryAddressAvailable', json_decode($deliveryAddressAvailable))
                                                                ->with('availableAddresses', json_decode($availableAddressTypes))
                                                                ->with('deliveryFee', $deliveryFee);
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function applyVoucher(Request $request)
    {
        if(Auth::check())
        {
            $code = $request['VoucherCode'];

            $voucher = Voucher::where('vouchers.Code', $code)
                                ->join('voucher_types as vt', 'vt.id', '=', 'VoucherType_ID')
                                ->select('vouchers.id','vouchers.StartDate', 'vouchers.ExpiryDate', 'vt.Code', 'vouchers.Discount', 'vouchers.Active')
                                ->first();

            if ($voucher != null)
            {
                if ($voucher->StartDate < date('Y-m-d H:i:s') && $voucher->ExpiryDate > date('Y-m-d H:i:s') && $voucher->Active)
                {
                    $userId = Auth::id();
                    $userVoucher = UserVoucher::where([['User_ID', $userId],['Voucher_ID', $voucher->id]])
                                                ->first();

                    if ($userVoucher == null)
                    {
                        $userVoucher = new UserVoucher();
                        $userVoucher->User_ID = $userId;
                        $userVoucher->Voucher_ID = $voucher->id;
                        $userVoucher->Used = 1;

                        if($userVoucher->save())
                        {
                            if($voucher->Code == 'SUMF')
                            {
                                $value = '+' . $voucher->Discount;
                                $condition = new \Darryldecode\Cart\CartCondition(array(
                                    'name' => 'Discount',
                                    'type' => 'tax',
                                    'target' => 'total',
                                    'value' => $value,
                                    'order' => 2
                                ));

                                \Cart::session($userId)->condition($condition);
                            }
                            else
                            {
                                $value = $voucher->Discount . '%';
                                $condition = new \Darryldecode\Cart\CartCondition(array(
                                    'name' => 'Discount',
                                    'type' => 'tax',
                                    'target' => 'total',
                                    'value' => $value,
                                    'order' => 1
                                ));

                                \Cart::session($userId)->condition($condition);
                            }
                            return response()->json(['success' => 'success'], 200);
                        }
                    }
                    else
                    {
                        return response('Voucherul a fost folosit deja.', 400)->header('Content-Type', 'text/plain');
                    }
                }
                else
                {
                    return response('Voucherul inactiv sau expirat.', 400)->header('Content-Type', 'text/plain');
                }
            }
            else
            {
                return response('Voucher invalid sau inexistent.', 400)->header('Content-Type', 'text/plain');
            }
        }
    }

    public function finalizeOrder(Request $request)
    {
        if (Auth::check())
        {
            $userId = Auth::id();
            if($request['cash-payment'] == 1)
            {
                $order = new Order();

                $order->PaymentType_ID = PaymentType::where('Code', 'plata-livrare')->select('id')->first()->id;
                $order->InvoiceAddress_ID = $request->InvoiceAddress_ID;
                $order->DeliveryAddress_ID = $request->DeliveryAddress_ID;
                $order->User_ID = $userId;
                $order->ShipCharge = $request->deliveryCost;
                $order->TotalNet = \Cart::session($userId)->getTotal();
                $order->AuditUser = 'System';

                if($order->save())
                {
                    $productList = \Cart::getContent()->toArray();
                    $orderId = $order->id;

                    foreach($productList as $product)
                    {
                        $productPrice = $product['price'];
                        $quantity = $product['quantity'];

                        $orderItemModel = new OrderItem();
                        $orderItemModel->Order_ID = $orderId;
                        $orderItemModel->Product_ID = $product['associatedModel']['id'];
                        $orderItemModel->Quantity = $quantity;
                        $orderItemModel->ProductPrice = $productPrice;
                        $orderItemModel->Total = $productPrice * $quantity;

                        $orderItemModel->save();
                    }

                    \Cart::session($userId)->clear();
                    return redirect()->route('orderSuccess', ['id' => $order->id]);
                }
            }
        }
    }

    public function orderSuccess($id)
    {
        return view('cart.ordersuccess')->with('orderNumber', $id);
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepo->findParticularProductBySlug($request->slug);

        if($product != null)
        {
            if (Auth::check())
            {
                $userId = Auth::id();
                \Cart::session($userId)->add(array(
                    'id' => $product->id,
                    'name' => $product->Name,
                    'price' => $product->DiscountPrice != null ? $product->DiscountPrice : $product->Price,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $product
                ));
            }
            else
            {
                \Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->Name,
                    'price' => $product->DiscountPrice != null ? $product->DiscountPrice : $product->Price,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $product
                ));
            }
        }
        else
        {
            return response('Produsul nu a putu fi gasit.', 400)->header('Content-Type', 'text/plain');
        }

        return response()->json(['success' => 'success'], 200);
    }

    public function updateCartItemQuantity(Request $request)
    {
        $itemId = $request->id;
        $newValue = $request->quantity;
        $cartCollection = null;
        //$cartTotal = null;

        if (Auth::check())
        {
            $userId = Auth::id();
            \Cart::session($userId)->update($itemId,[
                'quantity' => array(
                    'relative' => false,
                    'value' => $newValue
                ), ]);
            $cartCollection = \Cart::session($userId)->getContent();
            //$cartTotal = \Cart::session($userId)->getTotal();
        }
        else
        {
            \Cart::update($itemId,[
                'quantity' => array(
                    'relative' => false,
                    'value' => $newValue
                ), ]);
            $cartCollection = \Cart::getContent();
           // $cartTotal = \Cart::getTotal();
        }

        return response()->json($cartCollection);
    }

    public function removeItemFromCart(Request $request)
    {
        $itemId = $request->id;
        $cartCollection = null;
        //$cartTotal = null;

        if (Auth::check())
        {
            $userId = Auth::id();
            \Cart::session($userId)->remove($itemId);
            $cartCollection = \Cart::session($userId)->getContent();
            //$cartTotal = \Cart::session($userId)->getTotal();
        }
        else
        {
            \Cart::remove($itemId);
            $cartCollection = \Cart::getContent();
            //$cartTotal = \Cart::getTotal();
        }

        return response()->json($cartCollection);
    }

    public function getCartContent()
    {
        $cartCollection = null;

        if (Auth::check())
        {
            $userId = Auth::id();
            $cartCollection = \Cart::session($userId)->getContent();
        }
        else
        {
            $cartCollection = \Cart::getContent();
        }

        return response()->json($cartCollection);
    }
}
