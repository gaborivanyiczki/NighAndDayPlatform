@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    product_attributes
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> product_attributes </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('product_attributes.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.product_attribute')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection