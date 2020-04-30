@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    product_media_files
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> product_media_files </h3>
@endsection
@section('tools')
<a class="btn btn-secondary" href="{{route('product_media_files.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.product_media_file')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection