@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Autentificare Clienti</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">acasa</a></li>
                        <li class="breadcrumb-item active">autentificare</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="login-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Autentificare</h3>
                <div class="theme-card">
                    <form method="POST" class="theme-form" action="{{ route('login') }}">
                         @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-solid">
                                    {{ __('Autentificare') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Ti-ai uitat parola?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 right-login">
                <h3>Client Nou</h3>
                <div class="theme-card authentication-right">
                    <h5 class="title-font">Client nou?</h5>
                    <h6>Bine ai venit!</h6>
                    <p>Înscrie-te pentru un cont gratuit la magazinul nostru. Înregistrarea este rapidă și ușoară. Prin crearea unui cont vei putea comanda produsele dorite ușor și rapid. Pentru a începe cumpărăturile, faceți click pe butonul de mai jos.</p><a href="{{ route('register') }}" class="btn btn-solid">Creare Cont</a></div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->

@endsection
