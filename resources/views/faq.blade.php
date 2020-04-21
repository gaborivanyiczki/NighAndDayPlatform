@extends('layouts.app')

@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Intrebari frecvente</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">intrebari frecvente</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion theme-accordion" id="accordionExample">

                    @empty($data)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Nu exista intrebari.</button></h5></div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>..........</p>
                            </div>
                        </div>
                    </div>
                    @else
                        @foreach (json_decode($data, true) as $key => $question)

                            <div class="card">
                                <div class="card-header" id="heading-{!! $key !!}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{!! $key !!}" aria-expanded="true" aria-controls="collapse-{!! $key !!}">{!! $question['question'] !!}</button>
                                    </h5>
                                </div>
                                <div id="collapse-{!! $key !!}" class="collapse" aria-labelledby="heading-{!! $key !!}" data-parent="#accordion-{!! $key !!}">
                                    <div class="card-body">
                                        <p>{!! $question['description'] !!}</p>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endempty

                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->


@endsection
