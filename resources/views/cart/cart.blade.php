@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>COS</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">cos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs" id="carttable">
                    <thead>
                    <tr class="table-head">
                        <th scope="col"></th>
                        <th scope="col">Denumire produs</th>
                        <th scope="col">Pret</th>
                        <th scope="col">Cantitate</th>
                        <th scope="col">Actiuni</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                    </thead>
                    @empty(json_decode($cartModel, true))
                    <tbody>
                        <td>Nu exista produse.</td>
                    </tbody>
                    @else

                        @foreach (json_decode($cartModel, true) as $item)
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#"><img src="{{ URL::to('/') }}/images/pro3/1.jpg" alt=""></a>
                                </td>
                                <td><a href="{{ route('productdetails', ['slug' => $item['associatedModel']['Slug']]) }}">{!! $item['associatedModel']['Name'] !!}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col-xs-3">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number" value="{!! $item['quantity'] !!}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color">{!! $item['associatedModel']['DiscountPrice'] != null ? $item['associatedModel']['DiscountPrice'] : $item['associatedModel']['Price'] !!} Lei</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a href="#" class="icon" id="removeItemFromCartM" data-target="{!! $item['id'] !!}"><i class="ti-close"></i></a></h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>{!! $item['associatedModel']['DiscountPrice'] != null ? $item['associatedModel']['DiscountPrice'] : $item['associatedModel']['Price'] !!} Lei</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number" value="{!! $item['quantity'] !!}">
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="icon" id="removeItemFromCart" data-target="{!! $item['id'] !!}"><i class="ti-close"></i></a></td>
                                <td>
                                    <h3>{!! $item['associatedModel']['DiscountPrice'] != null ? $item['quantity'] * $item['associatedModel']['DiscountPrice'] : $item['quantity'] * $item['associatedModel']['Price'] !!} Lei</h3>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach

                    @endempty

                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td style="width: 82%;"><h3>total:</h3></td>
                        <td><h3 style="font-weight: bold;" id="carttotal">{!! $cartTotal !!} Lei</h3></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="{{ route('home') }}" class="btn btn-solid">continua cumparaturile</a></div>
            <div class="col-6"><a href="#" class="btn btn-solid">finalizeaza</a></div>
        </div>
    </div>
</section>
<!--section end-->

@endsection
