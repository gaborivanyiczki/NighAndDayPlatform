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
                        <li class="breadcrumb-item active" aria-current="page">Voucherele mele</li>
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
                <div class="account-sidebar"><a class="popup-btn">Vouchere</a></div>
                <div class="dashboard-left">
                    <div class="dashboard">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> inapoi</span></div>
                        <div class="block-content">
                            <ul>
                                <li><a href="{{ route('myaccount') }}">Informatii cont</a></li>
                                <li><a href="{{ route('myaddresses') }}">Adrese personale</a></li>
                                <li><a href="{{ route('myorders') }}">Comenzile mele</a></li>
                                <li class="active"><a href="#">Voucherele mele</a></li>
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
                                Acest panou este menit sa ofere posibilitatea de a verifica disponibilitatea voucherelor pe care le detineti.
                            </div>
                            <div class="alert alert-info" role="alert">
                                Atentie! Puteti aplica doar un singur voucher per comanda plasata.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="box-account box-info">
                            <div class="box-head" style="margin-bottom: 8px;">
                                <h2>Voucherele mele</h2>
                            </div>
                            <div class="content">
                                <table class="table table-striped">
                                    <thead>
                                    </thead>
                                    <tbody>
                                       @empty($userVouchers)
                                            <tr>
                                                <td>
                                                    <h6>Nu aveti vouchere disponibile.</h6>
                                                </td>
                                            </tr>
                                       @else
                                            @foreach ($userVouchers as $item)
                                            <tr>
                                                <td>
                                                    <h6>{!! $item['VoucherCode'] !!}</h6>
                                                </td>
                                                <td>
                                                    <h6>{!! $item['Discount'] !!} {!! $item['Sign'] !!} reducere</h6>
                                                </td>
                                                <td>
                                                    <h6>Valabilitate: {!! date('d-m-Y', strtotime($item['StartDate'])); !!} - {!! date('d-m-Y', strtotime($item['ExpiryDate'])); !!}</h6>
                                                </td>
                                                @if ($item['Used'])
                                                <td>
                                                    <h6>Status: <b>Folosit</b></h6>
                                                </td>
                                                @elseif($item['StartDate'] < date('Y-m-d H:i:s') && $item['ExpiryDate'] > date('Y-m-d H:i:s') && $item['Active'])
                                                <td>
                                                    <h6>Status: <b style="color:green;">Disponibil</b></h6>
                                                </td>
                                                @else
                                                <td>
                                                    <h6>Status: <b>Expirat / Dezactivat</b></h6>
                                                </td>
                                                @endif
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
