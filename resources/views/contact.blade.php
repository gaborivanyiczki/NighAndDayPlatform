@extends('layouts.app')

@section('content')



<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Contact</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="contact-page section-b-space" style="background-color: white;">
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
        <div class="row section-b-space">
            <div class="col-lg-7 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.917454109797!2d23.54660231587258!3d47.64717089316723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4737dc3a52a98f95%3A0xbf893247d694d938!2sStrada%20Depozitelor%207%2C%20Baia%20Mare!5e0!3m2!1sen!2sro!4v1585558836791!5m2!1sen!2sro" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-lg-5">
                <div class="contact-right">
                    <ul>
                        @empty($data)
                            <li>
                                <div class="contact-icon"><img src="{{ URL::to('/') }}/images/icon/phone.png" alt="Generic placeholder image">
                                    <h6>Relatii clienti</h6></div>
                                <div class="media-body">
                                    <p>not defined</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Adresa Sediu</h6></div>
                                <div class="media-body">
                                    <p>not defined</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><img src="{{ URL::to('/') }}/images/icon/email.png" alt="Generic placeholder image">
                                    <h6>Email</h6></div>
                                <div class="media-body">
                                    <p>not defined</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                    <h6>Fax</h6></div>
                                <div class="media-body">
                                    <p>not defined</p>
                                </div>
                            </li>
                        @else
                        @foreach (json_decode($data, true) as $key => $value)
                        @if($value['Value'] != null)
                        <li>
                            <div class="contact-icon"><img src="{{ URL::to('/') }}/images/icon/{!! $value['Icon'] !!}" alt="Generic placeholder image">
                                <h6>{!! $value['Name'] !!}</h6></div>
                            <div class="media-body">
                                <p>{!! $value['Value'] !!}</p>
                            </div>
                        </li>
                        @endif
                    @endforeach
                        @endempty
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3 style="color: #ff4c3b;"><i class="fa fa-envelope"></i> Formular contact</h3>
                <h6>Probleme cu comenzile? Probleme cu site-ul? Ai intrebari sau comentarii? Orice problema ai avea, Departamentul de Relatii cu Clientii este gata sa te ajute. Te rugam sa ne contactezi prin formularul de mai jos. Noi vom rezolva orice problema vei avea, cat mai curand posibil.</h6>
                <hr>

                {!! Form::open(['route'=>'contactus.store', 'class' => 'theme-form']) !!}
                @honeypot
                <div class="form-row">
                    <div class="col-md-6 {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        {!! Form::label('Nume:') !!}
                        {!! Form::text('firstname', old('firstname'), ['class'=>'form-control', 'placeholder'=>'Introduceti numele dvs']) !!}
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                    </div>
                    <div class="col-md-6 {{ $errors->has('lastname') ? 'has-error' : '' }}">
                        {!! Form::label('Prenume:') !!}
                        {!! Form::text('lastname', old('lastname'), ['class'=>'form-control', 'placeholder'=>'Introduceti prenumele dvs']) !!}
                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                    </div>
                    <div class="col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::label('Email:') !!}
                        {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Introduceti email-ul dvs']) !!}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="col-md-12 {{ $errors->has('message') ? 'has-error' : '' }}">
                        {!! Form::label('Mesajul dvs:') !!}
                        {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Va rugam sa ne descrieti motivul pentru care ne contactati', 'rows'=>'6']) !!}
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-solid">Trimite</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>
<!--Section ends-->

@endsection
