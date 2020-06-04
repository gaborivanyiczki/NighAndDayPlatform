@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Contul meu</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acasa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Comenzile mele</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">Comenzile mele</a></div>
                <div class="dashboard-left">
                    <div class="dashboard">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> inapoi</span></div>
                        <div class="block-content">
                            <ul>
                                <li><a href="{{ route('myaccount') }}">Informatii cont</a></li>
                                <li><a href="{{ route('myaddresses') }}">Adrese personale</a></li>
                                <li class="active"><a href="#">Comenzile mele</a></li>
                                <li><a href="{{ route('myvouchers') }}">Voucherele mele</a></li>
                                <li><a href="{{ route('mywarranties') }}">Garantiile mele</a></li>
                                <li><a href="{{ route('myreviews') }}">Review-urile mele</a></li>
                                <li><a href="{{ route('user.settings') }}">Setari cont</a></li>
                                <li><a href="{{ route('mysubscriptions') }}">Abonarile mele</a></li>
                                <li class="last"><a style="color:red;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>Salut, {{ Auth::user()->firstname }} {{Auth::user()->lastname}}</h2>
                        </div>
                        <div class="welcome-msg">
                            <div class="alert alert-info" role="alert">
                                Acest panou este menit sa ofere posibilitatea de a edita sau adauga adresele tale personale.
                            </div>
                            <div class="alert alert-info" role="alert">
                                Setarea unei adrese implicite va ajuta sa economisesti timp la finalizarea unei comenzi.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="box-account box-info">
                            <div class="box-head" style="margin-bottom: 8px;border-bottom: 2px solid;">
                                <h2>Comenzile mele</h2></div>
                                <div class="row">
                                    <table class="table table-borderless">
                                        <thead>
                                        </thead>
                                        <tbody>
                                           @empty($userOrders)
                                                <tr>
                                                    <td>
                                                        <h6>Nu exista comenzi.</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <a href="{{ route('home') }}" type="button" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Continua cumparaturile</a>
                                                    </td>
                                                </tr>
                                           @else
                                                @foreach ($userOrders as $order)
                                                <tr>
                                                    <td>
                                                        <h5>Comanda nr. {!! $order['OrderNumber'] !!}</h5>
                                                        <div class="alert alert-success" role="alert">
                                                            <address><b>Plasat pe:</b> {!! $order['OrderDate'] !!}</address>
                                                            <address><b>Total comanda:</b> {!! $order['Total'] !!} Lei</address>
                                                            <address><b>Cost transport:</b> {!! $order['ShipCharge'] !!} Lei</address>
                                                            <address><b>Metoda de plata:</b> {!! $order['PaymentType'] !!}</address>
                                                            <address><b>Status comanda:</b> {!! $order['OrderStatus'] !!}</address>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('myorders.generateInvoice', $order['OrderNumber'])}}" type="button" class="btn btn-success" style="margin-top: 33px;"><i class="fa fa-files-o"></i> Descarca factura</a>
                                                    </td>
                                                   </tr>
                                                @endforeach
                                           @endempty
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

@endsection
