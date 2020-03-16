@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Reseteaza-ti parola usor si rapid</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">acasa</a></li>
                        <li class="breadcrumb-item active">resetare parola</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="pwd-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">           
                <h2>Resetare parola</h2>
                <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Introduceti emailul dvs..." value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-solid">{{ __('Reseteaza parola') }}</button>
                    </div>
                </form>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</section>
<!--Section ends-->

@endsection
