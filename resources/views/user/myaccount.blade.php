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
                        <li class="breadcrumb-item active" aria-current="page">Contul meu</li>
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
                <div class="account-sidebar"><a class="popup-btn">Contul meu</a></div>
                <div class="dashboard-left">
                    <div class="dashboard">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> inapoi</span></div>
                        <div class="block-content">
                            <ul>
                                <li class="active"><a href="#">Informatii cont</a></li>
                                <li><a href="{{ route('myaddresses') }}">Adrese personale</a></li>
                                <li><a href="{{ route('myorders') }}">Comenzile mele</a></li>
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
                                Ne bucuram ca ai ales sa folosesti platforma noastra si dorim sa te tinem la curent cu toate ofertele curente. Pentru a beneficia de acest lucru te rugam sa verifici setarile contului tau.
                            </div>
                            <div class="alert alert-info" role="alert">
                                Acest panou este menit sa ofere posibilitatea de a vizualiza o imagine a activității recente a contului și de a actualiza informațiile contului tau. Selectați un link de mai jos pentru a vizualiza sau edita informații.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="box-account box-info">
                            <div class="box-head" style="margin-bottom: 8px;">
                                <h2>Informatii cont</h2></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Informatii personale</h3><a href="{{ route('user.settings') }}">Editeaza</a></div>
                                        <div class="box-content">
                                            <table class="table table-borderless">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td style="font-weight: 700;">Nume complet:</td>
                                                    <td>{!! $userModel->fullname !!}</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="font-weight: 700;">Email implicit:</td>
                                                    <td>{!! $userModel->email !!}</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="font-weight: 700;">Telefon implicit:</td>
                                                    <td>{!! $userModel->telephone !!}</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="font-weight: 700;">Parola:</td>
                                                    <td>******** <h6><a href="{{ route('user.settings') }}">Schimba Parola</a></h6></td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                        <h3>Abonari</h3><a href="{{ route('mysubscriptions') }}">Editeaza</a></div>
                                        <div class="box-content">
                                            @if ($userModel->subscriptions)
                                            <p><i class="fa fa-check" style="color:green;"></i> Newsletter</p>
                                            @else
                                            <p>Nu exista abonari.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                    <h3>Adrese implicite</h3><a href="{{ route('myaddresses') }}">Gestioneaza Adrese</a></div>
                                    <div class="row">
                                        @empty ($userModel->defaultAddresses)
                                            <div class="col-sm-6">
                                                <h6>Nu exista adrese setate.</h6>
                                            </div>
                                        @else
                                            @foreach ($userModel->defaultAddresses as $item)
                                                <div class="col-sm-6">
                                                    <div class="alert alert-success" role="alert">
                                                        <h6>{!! $item->AddressTypeName !!}</h6>
                                                        <address>Adresa: {!! $item->Address !!} {!! $item->ZipCode !!}<br></address>
                                                        <address>Numar contact: {!! $item->Telephone !!}<br></address>
                                                        <address>Persoana contact: {!! $item->ContactName !!}<br></address>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endempty
                                    </div>
                                </div>
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
