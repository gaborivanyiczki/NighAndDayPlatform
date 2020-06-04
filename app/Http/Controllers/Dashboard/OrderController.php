<?php

namespace App\Http\Controllers\Dashboard;

use App\CustomOrder;
use App\DataTables\ConfiguratorOrderDataTable;
use App\DataTables\OrderArchivedDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\OrderInvoiceDataTable;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use App\Repository\Eloquent\OrderRepository;
use App\Repository\Eloquent\ProductsRepository;
use App\Repository\Eloquent\UserRepository;
use App\ViewModels\OrderViewModel;
use App\Http\Requests\Orders\Store;
use App\Http\Requests\Orders\Update;
use App\OrderAddress;
use App\OrderItem;
use App\PaymentType;
use App\Repository\Eloquent\OrderAddressRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\ShipmentStatus;
use App\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \ConsoleTVs\Invoices\Classes\Invoice;
use Carbon\Carbon;

class OrderController extends Controller
{
    protected $ordersRepo;
    protected $usersRepo;
    protected $productsRepo;
    protected $orderAddressRepo;
    protected $userAddressRepo;

    public function __construct(UserRepository $userRepository, ProductsRepository $productsRepository, OrderRepository $orderRepository, OrderAddressRepository $orderAddressRepository, UserAddressRepository $userAddressRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
        $this->usersRepo = $userRepository;
        $this->productsRepo = $productsRepository;
        $this->ordersRepo = $orderRepository;
        $this->orderAddressRepo = $orderAddressRepository;
        $this->userAddressRepo = $userAddressRepository;
    }

    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.index');
    }

    public function configurator(ConfiguratorOrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.configurator');
    }

    public function archived(OrderArchivedDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.archived');
    }

    public function invoices(OrderInvoiceDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.invoices');
    }

    public function show($id)
    {
        $order = $this->ordersRepo->findOrderWithParticularColumnsById($id);
        $model = new OrderViewModel($order);

        return view('dashboard.order.show', ['model' => $model ]);
    }

    public function configuratorOrderShow($id)
    {
        $order = CustomOrder::leftjoin('users', 'users.id', '=', 'User_ID')
                            ->join('configurator_elements as ce', 'ce.id', '=', 'Sponge_ID')
                            ->join('configurator_elements as ces', 'ces.id', '=', 'Cover_ID')
                            ->where('custom_orders.id', $id)
                            ->select(['custom_orders.id', 'custom_orders.lenght', 'custom_orders.width', 'custom_orders.quantity', 'custom_orders.observation','ce.Name as Sponge','ces.Name as Cover', 'users.Email'])
                            ->first();


        return view('dashboard.order.configuratorShow', ['model' => $order ]);
    }

    public function create()
    {
        $users = $this->usersRepo->getActiveUsers();
        $statuses = OrderStatus::select('id','Name')->get();
        $paymentTypes = PaymentType::select('id','Name')->get();
        $shipmentStatuses = ShipmentStatus::select('id','Name')->get();

        return view('dashboard.order.create', [
            'users' => $users,
            'statuses' => $statuses,
            'paymentTypes' => $paymentTypes,
            'shipmentStatuses' => $shipmentStatuses
        ]);
    }

    public function store(Store $request)
    {
        $model=new Order();
        if($request['InvoiceAddress_ID'] == null)
        {
            $model->OrderAddress_ID = $this->orderAddressRepo->storeAddress($request);
            $model->ShipCharge = $request['ShipCharge'];
            $model->OrderStatus_ID = $request['OrderStatus_ID'];
            $model->PaymentType_ID = $request['PaymentType_ID'];
            $model->ShipmentStatus_ID = $request['ShipmentStatus_ID'];
            $model->TotalNet = $request['TotalValue'];
            $model->Confirmed = $request['Confirmed'];
            $model->Archived = $request['Archived'];
        }
        else
        {
            $model->InvoiceAddress_ID = $request['InvoiceAddress_ID'];
            $model->DeliveryAddress_ID = $request['DeliveryAddress_ID'];
            //$model->OrderAddress_ID = $this->orderAddressRepo->storeAddressByUserAddress($request['UserAddress_ID']);
            $model->ShipCharge = $request['ShipCharge'];
            $model->OrderStatus_ID = $request['OrderStatus_ID'];
            $model->PaymentType_ID = $request['PaymentType_ID'];
            $model->ShipmentStatus_ID = $request['ShipmentStatus_ID'];
            $model->TotalNet = $request['TotalValue'];
            $model->Confirmed = $request['Confirmed'];
            $model->Archived = $request['Archived'];
        }

        if($request['User_ID'] != null)
        {
            $model->User_ID = $request['User_ID'];
        }

        $model->AuditUser = Auth::user()->email;

        if ($model->save())
        {
            $productList = $request->product_id;
            $quantities = $request->product_qty;
            $orderId = $model->id;

            foreach($productList as $key => $product)
            {
                $productPrice = $this->productsRepo->getProductPrice($product);
                $quantity = $quantities[$key];

                $orderItemModel = new OrderItem();
                $orderItemModel->Order_ID = $orderId;
                $orderItemModel->Product_ID = $product;
                $orderItemModel->Quantity = $quantity;
                $orderItemModel->ProductPrice = $productPrice;
                $orderItemModel->Total = $productPrice * $quantity;

                $orderItemModel->save();
            }

            session()->flash('app_message', 'Order successfully created');
            return redirect()->route('dashboard.orders');
        }
        else
        {
            session()->flash('app_error', 'Something is wrong while creating Order');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $order = $this->ordersRepo->findOrderById($id);
        $users = $this->usersRepo->getActiveUsers();
        $invoiceAddresses = null;
        $deliveryAddresses = null;
        $statuses = OrderStatus::select('id','Name')->get();
        $paymentTypes = PaymentType::select('id','Name')->get();
        $shipmentStatuses = ShipmentStatus::select('id','Name')->get();
        $orderAddress = OrderAddress::find($order->OrderAddress_ID);

        if($order->User_ID != null)
        {
            $invoiceAddresses = json_encode($this->userAddressRepo->getInvoiceAddresses($order->User_ID));
            $deliveryAddresses = json_encode($this->userAddressRepo->getDeliveryAddresses($order->User_ID));
        }

        return view('dashboard.order.edit', [
            'order' => $order,
            'address' => $orderAddress,
            'invoiceAddresses' => json_decode($invoiceAddresses, true),
            'deliveryAddresses' => json_decode($deliveryAddresses, true),
            'users' => $users,
            'statuses' => $statuses,
            'paymentTypes' => $paymentTypes,
            'shipmentStatuses' => $shipmentStatuses
            ]);
    }

    public function update(Update $request)
    {
        $orderId = $request->OrderID;
        $model = $this->ordersRepo->findOrderById($orderId);

        if($request['InvoiceAddress_ID'] != $model->InvoiceAddress_ID || $request['DeliveryAddress_ID'] != $model->DeliveryAddress_ID)
        {
            if($request['InvoiceAddress_ID'] == null || $request['DeliveryAddress_ID'] == null)
            {
                $orderAddress = new OrderAddress();
                $model->InvoiceAddress_ID = null;
                $model->DeliveryAddress_ID = null;
                $orderAddress->Address = $request['Address'] != null ? $request['Address'] : 'Not set';
                $orderAddress->ZipCode = $request['ZipCode'] != null ? $request['ZipCode'] : 'Not set';
                $orderAddress->Telephone = $request['Telephone'] != null ? $request['Telephone'] : 'Not set';
                $orderAddress->Email = $request['Email'] != null ? $request['Email'] : 'Not set';
                $orderAddress->ContactName = $request['ContactName'] != null ? $request['ContactName'] : 'Not set';
                $orderAddress->save();
            }else{
                $model->InvoiceAddress_ID = $request['InvoiceAddress_ID'];
                $model->DeliveryAddress_ID = $request['DeliveryAddress_ID'];
            }
            $model->ShipCharge = $request['ShipCharge'];
            $model->OrderStatus_ID = $request['OrderStatus_ID'];
            $model->PaymentType_ID = $request['PaymentType_ID'];
            $model->ShipmentStatus_ID = $request['ShipmentStatus_ID'];
            $model->TotalNet = $request['TotalValue'];
            $model->Confirmed = $request['Confirmed'];
            $model->Archived = $request['Archived'];
        }
        else
        {
            $model->User_ID = $request['User_ID'];
            $model->ShipCharge = $request['ShipCharge'];
            $model->OrderStatus_ID = $request['OrderStatus_ID'];
            $model->PaymentType_ID = $request['PaymentType_ID'];
            $model->ShipmentStatus_ID = $request['ShipmentStatus_ID'];
            $model->TotalNet = $request['TotalValue'];
            $model->Confirmed = $request['Confirmed'];
            $model->Archived = $request['Archived'];
        }

        if($request['User_ID'] != $model->User_ID)
        {
            $model->User_ID = $request['User_ID'];
        }

        $model->AuditUser = Auth::user()->email;

        if ($model->save())
        {
            session()->flash('app_message', 'Order successfully updated');
            return redirect()->route('dashboard.orders');
        }
        else
        {
            session()->flash('app_error', 'Something is wrong while updating order');
        }
        return redirect()->back();
    }


    public function archive($id)
    {
        Order::where('id', $id)->update(['Archived' => 1]);

        return redirect()->back();
    }


    public function getProducts()
    {
        $products = $this->productsRepo->getActiveProductsForSelect();

        return response()->json($products);
    }

    public function getProductPrice(Request $request)
    {
        $currentTotal = $request->total;
        $price = $this->productsRepo->getProductPrice($request->product);
        $subtotal = $price * $request->quantity;

        $currentTotal += $subtotal;

        return response()->json($currentTotal);
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
}
