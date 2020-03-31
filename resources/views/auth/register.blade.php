@extends('layouts.app')

@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Bine ai venit! Te rugam sa iti introduci datele contului</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acasa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inregistrare cont</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Inregistrare cont</h3>
                <div class="theme-card">
                    <form class="theme-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="firstname">Nume</label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" placeholder="Introduceti numele dvs..." name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Prenume</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" placeholder="Introduceti prenumele dvs..." name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Introduceti emailul dvs..." value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="telephone">Telefon</label>
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" placeholder="Introduceti numarul de telefon..." value="{{ old('telephone') }}" required autocomplete="telephone">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="password">Parola</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Introduceti parola dorita..." required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm">Confirmare Parola</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmati parola..." required autocomplete="new-password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-solid">Creaza cont</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


@endsection
