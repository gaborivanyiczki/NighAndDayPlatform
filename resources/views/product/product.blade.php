@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{!! $productModel['product']['name'] !!}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">produs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-sm-2 col-xs-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-right-nav">
                                @foreach($productModel['product']['images'] as $image)
                                    <div><img src="{{ URL::to('/') }}/images/uploads/{!! $image['path'] !!}/{!! $image['filename'] !!}" alt="" class="img-fluid blur-up lazyload"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-10 col-xs-12 order-up">
                    <div class="product-right-slick">
                       @foreach($productModel['product']['images'] as $image)
                            <div><img src="{{ URL::to('/') }}/images/uploads/{!! $image['path'] !!}/{!! $image['filename'] !!}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                       @endforeach
                    </div>
                </div>
                <div class="col-lg-6 rtl-text">
                    <div class="product-right">
                        <h2>{!! $productModel['product']['name'] !!}</h2>
                        @empty ( $productModel['product']['discountPrice'] )
                            <h3>{!! $productModel['product']['price'] !!} Lei</h3>
                        @else
                            <h4><del>{!! $productModel['product']['price'] !!} Lei</del><span>{!! $productModel['product']['discount'] !!}% reducere</span></h4>
                            <h3>{!! $productModel['product']['discountPrice'] !!} Lei</h3>
                        @endempty

                        @if ($productModel['product']['quantity'] > 5)
                        <span class="label-instock">In stoc</span>
                        @elseif($productModel['product']['quantity'] >= 1 && $productModel['product']['quantity'] <= 5)
                        <span class="label-limitedstock">Stoc limitat</span>
                        @else
                        <span class="label-outofstock">Stoc epuizat</span>
                        @endif

                        <div class="product-description border-product">

                            @foreach ($productModel['product']['choosable'] as $item)
                                <h6 class="product-title size-text">alege {!! $item['attributeName'] !!} <span><a href="" data-toggle="modal" data-target="#sizemodal">lista dimensiuni</a></span></h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Lista Dimensiuni</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body"><img src="{{ URL::to('/') }}/images/size-chart.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="size-box" style="max-width: 50%;">
                                    <select class="form-control" size="1">
                                        <option value="#">{!! $item['value'] !!}</option>
                                        @foreach ($item['attributeList'] as $attributeItem)
                                        <option value="{{ route('productdetails', ['slug' => $attributeItem['Slug']]) }}">{!! $attributeItem['Value'] !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach

                            <h6 class="product-title">Cantitate</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div>
                        </div>
                        <div class="product-buttons">
                            <button class="cart-button btn btn-solid" data-target="{!! $productModel['product']['slug'] !!}"><i class="fa fa-shopping-cart"></i> adauga in cos</button>
                            <button class="btn btn-solid gray-btn" style="margin-left:15px;"><i class="fa fa-heart" style="color:red;"></i> adauga in wishlist</button>
                        </div>
                        <div class="border-product">
                            <ul>
                                <li style="display: block;">Cod produs: <b>{{ $productModel['product']['productCode'] }}</b></li>
                                <li style="display: block;">Garantie: <b>{{ $productModel['product']['warranty'] }} luni</b></li>
                                <li style="display: block;">Drept retur: <b>{{ $productModel['product']['return'] }} zile</b></li>
                                <li style="display: block;">Termen de livrare: <b>{{ $productModel['product']['delivery'] }} zile lucratoare</b></li>
                            </ul>
                        </div>

                        <div class="border-product">
                            <h6 class="product-title">Facilitati</h6>
                            <div class="payment-card-bottom">
                                <ul>
                                    <li>
                                        <a href="#"><img src="{{ URL::to('/') }}/images/icon/product-card-payment.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ URL::to('/') }}/images/icon/product-return.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ URL::to('/') }}/images/icon/product-delivery.png" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ URL::to('/') }}/images/icon/product-personalizable.png" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">Distribuie</h6>
                            <div class="product-icon">
                                <ul class="product-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- product-tab starts -->
<section class="tab-product m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Descriere</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Specificatii</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-selected="false">Video</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Review-uri</a>
                        <div class="material-border"></div>
                    </li>
                </ul>

                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                       <p> {!! $productModel['product']['description'] !!} </p>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <div class="single-product-tables">
                            <div class="col-md-12">

                                @foreach ($productModel['attributeGroups'] as $attributeGroup)
                                <p class="text-uppercase"><strong>{!! $attributeGroup['attributeGroupName'] !!}</strong></p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            @foreach ($attributeGroup['attributeList'] as $attribute)
                                                <tr>
                                                    <td class="col-xs-4 text-muted">{!! $attribute['attributeName'] !!}</td>
                                                    <td class="col-xs-8">{!! $attribute['value'] !!}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="mt-4 text-center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/BUWzX78Ye_8" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <div class="single-product-tables">
                            <p>Nu exista</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->

<!-- similar products section start -->
@include('product.widgets.similarproducts', ['similarProducts' => $similarProducts])
<!-- similar products section end -->

<!-- other random products section start -->
@include('product.widgets.otherproducts', ['otherProducts' => $otherProducts])
<!-- other random products section end -->

@endsection
