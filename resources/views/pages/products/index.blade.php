@extends('dashboard.layout.layout')
@section('breadcrumb')
<li class="breadcrumb-item">
    products
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> products </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('dashboard.product.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.product')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection
