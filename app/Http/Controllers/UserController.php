<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddress;
use App\Repository\Eloquent\AddressTypeRepository;
use App\Repository\Eloquent\OrderRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\Repository\Eloquent\UserVouchersRepository;
use App\User;
use App\ViewModels\UserDetailsViewModel;
use App\ViewModels\UserViewModel;
use Facade\FlareClient\Http\Exceptions\BadResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OrderAddress;
use App\OrderItem;
use App\UserAddress;
use \ConsoleTVs\Invoices\Classes\Invoice;
use Carbon\Carbon;
use App\Order;

class UserController extends Controller
{
    protected $userAddressRepo;
    protected $addressTypeRepo;
    protected $userVouchersRepo;
    protected $ordersRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAddressRepository $userAddressRepository, AddressTypeRepository $addressTypeRepository, UserVouchersRepository $userVouchersRepository, OrderRepository $orderRepository)
    {
        $this->middleware('auth');
        $this->userAddressRepo = $userAddressRepository;
        $this->addressTypeRepo = $addressTypeRepository;
        $this->userVouchersRepo = $userVouchersRepository;
        $this->ordersRepo = $orderRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myaccount()
    {
        $userDetails = Auth::user();
        $userAddresses = $this->userAddressRepo->getDefaultUserAddresses($userDetails->id);
        $userViewModel = json_encode(new UserViewModel($userDetails, $userAddresses));

        return view('user.myaccount')->with('userModel', json_decode($userViewModel));
    }

    public function myaddresses()
    {
        $userAddresses = json_encode($this->userAddressRepo->getUserAddresses(Auth::id()));
        $availableAddressTypes =  json_encode($this->addressTypeRepo->getAvailableAddressTypes(Auth::id()));

        return view('user.myaddresses')->with('userAddresses', json_decode($userAddresses))
                                        ->with('availableAddresses', json_decode($availableAddressTypes));
    }

    public function myorders()
    {
        $userId = Auth::id();
        $userOrders = json_encode($this->ordersRepo->getUserOrders($userId));

        return view('user.myorders')->with('userOrders', json_decode($userOrders, true));
    }

    public function generateInvoice($orderId)
    {
        $order = Order::find($orderId);
        $orderAddress = null;
        $deliveryAddress = null;
        $invoiceAddress = null;

        $orderItems = OrderItem::join('products as p', 'p.id', '=', 'Product_ID')
        ->where('Order_ID', $orderId)
        ->select('p.Name as ProductName', 'order_items.Product_ID', 'order_items.Quantity', 'order_items.ProductPrice')
        ->get();
        $invoiceDate = Carbon::parse($order->created_at);

        if($order->OrderAddress_ID != null)
        {
            $orderAddress = OrderAddress::find($order->OrderAddress_ID);

            $deliveryAddress = $orderAddress->ContactName . ' - '. $orderAddress->Address. ' - '. $orderAddress->Telephone;
        }
        else
        {
            $orderAddress = UserAddress::find($order->DeliveryAddress_ID);

            $deliveryAddress = $orderAddress->ContactName . ' - '. $orderAddress->Address. ' - '. $orderAddress->Telephone;
        }

        if($order->User_ID != null)
        {
            $invoiceAddress = UserAddress::join('address_types as at', 'at.id', '=', 'AddresType_ID')
                                            ->where([['User_ID', $order->User_ID], ['at.Name', 'Adresa de facturare implicita']])
                                            ->firstOrNew();
        }

        $invoice = Invoice::make('Factura_'.$orderId.'_'.$invoiceDate);

        foreach($orderItems as $item)
        {
            $divider = 1 + 19/100;
            $priceBeforeVAT = number_format($item->ProductPrice / $divider, 2, '.', '');

            $invoice->addItem($item->ProductName, $priceBeforeVAT, $item->Quantity);
        }

        if($order->ShipCharge > 0)
        {
            $divider = 1 + 19/100;
            $priceBeforeVAT = number_format($order->ShipCharge / $divider, 2, '.', '');

            $invoice->addItem('Cost Livrare', $priceBeforeVAT , 1);
        }

        if($invoiceAddress != null)
        {
            $invoice->customer([
                'name'      => $invoiceAddress->ContactName,
                'phone'     => $invoiceAddress->Telephone,
                'location'  => $invoiceAddress->Address,
                'zip'       => $invoiceAddress->ZipCode,
                'country'   => 'Romania',
            ]);

        }else{

            $invoice->customer([
                'name'      => $orderAddress->ContactName,
                'phone'     => $orderAddress->Telephone,
                'location'  => $orderAddress->Address,
                'zip'       => $orderAddress->ZipCode,
                'country'   => 'Romania',
            ]);
        }

        $invoice->number($orderId)
                ->with_pagination(true)
                ->duplicate_header(true)
                ->due_date($invoiceDate)
                ->notes($deliveryAddress != null ? $deliveryAddress : '')
                ->download('Factura_'.$orderId.'_'.$invoiceDate->format('d-m-Y'));
    }

    public function myvouchers()
    {
        $userId = Auth::id();
        $vouchers = json_encode($this->userVouchersRepo->getUserVouchers($userId));

        return view('user.myvouchers')->with('userVouchers', json_decode($vouchers, true));
    }

    public function mywarranties()
    {
        return view('user.mywarranties');
    }

    public function myreviews()
    {
        return view('user.myreviews');
    }

    public function settings()
    {
        $userDetails = Auth::user();
        $userViewModel = json_encode(new UserViewModel($userDetails));

        return view('user.settings')->with('userModel', json_decode($userViewModel));
    }

    public function mysubscriptions()
    {
        return view('user.mysubscriptions');
    }

    public function postUserAddress(StoreUserAddress $request)
    {
        $validated = $request->validated();
        $default = 0;
        if($this->addressTypeRepo->isDefaultAddressType($validated['addressType']))
        {
           $default = 1;
        }

        $this->userAddressRepo->storeUserAddress(Auth::id(), $validated, $default);
        return redirect()->route('myaddresses');
    }

    public function postUserAddressCheckout(StoreUserAddress $request)
    {
        $validated = $request->validated();
        $default = 0;
        if($this->addressTypeRepo->isDefaultAddressType($validated['addressType']))
        {
           $default = 1;
        }

        $this->userAddressRepo->storeUserAddress(Auth::id(), $validated, $default);
        return redirect()->route('checkout');
    }

    public function updateUserAddress(StoreUserAddress $request)
    {
        $validated = $request->validated();
        $this->userAddressRepo->updateUserAddress(Auth::id(), $validated);

        return redirect()->route('myaddresses');
    }

    public function updateUserAddressCheckout(StoreUserAddress $request)
    {
        $validated = $request->validated();
        $this->userAddressRepo->updateUserAddress(Auth::id(), $validated);

        return redirect()->route('checkout');
    }

    public function getUserAddress(Request $request)
    {
        $addressTypeId = $request->id;

        if (Auth::check())
        {
            $userId = Auth::id();
            $userAddress = $this->userAddressRepo->getUserAddress($addressTypeId, $userId);

            return response()->json($userAddress);
        }
        else
        {
            return response('Not found', 400);
        }
    }

    public function removeUserAddress(Request $request)
    {
        $addressTypeId = $request->id;

        if (Auth::check())
        {
            $userId = Auth::id();
            $this->userAddressRepo->removeUserAddress($addressTypeId, $userId);

            return response()->json(['success' => 'success'], 200);
        }
        else
        {
            return response('Not found', 400);
        }
    }

    public function getUserDetails()
    {
        $userDetails = Auth::user();
        $userViewModel = new UserDetailsViewModel($userDetails);

        return response()->json($userViewModel);
    }

    public function updateUserDetails(Request $request)
    {
        $user = Auth::user();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->telephone = $request->telephone;

        $user->save();

        return redirect()->route('user.settings');
    }

    public function resetPassword(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            return redirect()->route('user.settings');
        }
        else
        {
            return response('Not found', 400);
        }
    }
}
