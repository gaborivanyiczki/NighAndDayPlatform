@extends('layouts.app')

@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Modalitati de plata</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">Modalitati de plata</li>
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
                    <h3>Modalitati de plata</h3>
                    <p></p>
                    <div><p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Suntem bucurosi sa iti oferim multiple metode de plata in functie de posibilitatile tale.</span></span></p>

                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Modalitățile de plata pentru finalizarea unei comenzi online sunt : </span></span></p>

                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Numerar la livrare</span></span></p>

                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Online cu card bancar</span></span></p>

                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">In cazul in care optați pentru plata online cu card bancar, va informam ca înregistrarea plații nu garantează confirmarea si livrarea comenzii. In cazul in care comanda nu este confirmata suma de bani plătita va fi restituita in contul dumneavoastră in cel mai scurt timp.</span></span></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


@endsection
