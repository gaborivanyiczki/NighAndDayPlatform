@extends('layouts.app')

@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Informatii livrare</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">Informatii livrare</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="faq-section section-b-space" style="background-color: white;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion theme-accordion" id="accordionExample">
                    <h3>Informatii livrare</h3>
                    <p></p>
                    <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Indiferent de produsele pe care le-ai comandat de la noi, vei beneficia de un serviciu de livrare . Ne dorim sa livram produsele cat mai rapid pentru a te bucura de acestea. &nbsp;Nu toate produsele noastre trăiesc sub același acoperiș, așa că există unele mici diferențe în modul în care vă vom livra comanda.</span></span></p>
                    <p></p>
                    <p><strong>Livrarea comenzilor pe teritoriul Romaniei</strong><br>
                        <br>
                        -&nbsp;&nbsp;&nbsp; modalitate de plata card credit/debit - Se percepe o taxa de transport de 20 lei.<br>
                        -&nbsp;&nbsp;&nbsp; modalitate de plata numerar - Se percepe o taxa de transport de 20 lei.</p>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


@endsection
