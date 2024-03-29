@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{!! $categoryModel['category']['Name'] !!}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">{!! $categoryModel['category']['Name'] !!}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-b-space ratio_asos" style="background-color: white;">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#"><img src="{{ URL::to('/') }}/images/{!! $categoryModel['category']['ImagePath'] !!}/{!! $categoryModel['category']['ImageName'] !!}" class="img-fluid blur-up lazyload" alt=""></a>
                                    <div class="top-banner-content small-section">
                                        <h4>{!! $categoryModel['category']['Name'] !!}</h4>
                                        {!! $categoryModel['category']['Description'] !!}
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="popup-filter">
                                                    <div class="sidebar-popup"><a class="popup-btn">Filtreaza</a></div>
                                                    <div class="open-popup">
                                                        <div class="collection-filter">
                                                            <!-- side-bar colleps block stat -->
                                                            <div class="collection-filter-block">
                                                                <!-- brand filter start -->
                                                                <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                                                                <div class="collection-collapse-block open">
                                                                    <h3 class="collapse-block-title">brand</h3>
                                                                    <div class="collection-collapse-block-content">
                                                                        <div class="collection-brand-filter">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- color filter start here -->
                                                                <div class="collection-collapse-block open">
                                                                    <h3 class="collapse-block-title">culori</h3>
                                                                    <div class="collection-collapse-block-content">
                                                                        <div class="color-selector">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- price filter start here -->
                                                                <div class="collection-collapse-block border-0 open">
                                                                    <h3 class="collapse-block-title">pret</h3>
                                                                    <div class="collection-collapse-block-content">
                                                                        <div class="collection-brand-filter">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- silde-bar colleps block end here -->
                                                        </div>
                                                    </div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="{{ URL::to('/') }}/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="{{ URL::to('/') }}/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="{{ URL::to('/') }}/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="{{ URL::to('/') }}/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select id="products-shown">
                                                            <option value="12" selected>12 produse pe pagina</option>
                                                            <option value="15">18 produse pe pagina</option>
                                                            <option value="25">32 produse pe pagina</option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select id="products-sort">
                                                            <option value="default">Sorteaza</option>
                                                            <option value="priceAsc">Pret crescator</option>
                                                            <option value="priceDesc">Pret descrescator</option>
                                                            <option value="newest">Cele mai noi</option>
                                                            <option value="oldest">Cele mai vechi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid product-load-more">
                                        <div id='loader' style="display:none;">
                                            <img src="{{ URL::to('/') }}/images/uploads/loader/ajax-loader.gif" style="position: absolute;top: 50%;left: 50%;margin: -50px 0px 0px -50px;"/>
                                        </div>
                                        <div class="row" id="product-list-collection">
                                            @if(json_decode($categoryModel['products'], true) == null)
                                            <div class="col-xl-3 col-md-6 col-grid-box" id="product-item">
                                                <div class="product-box">
                                                    <div class="product-detail">
                                                        <h6>Nu exista produse</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                                @foreach (json_decode($categoryModel['products'], true) as $value)
                                                    @if($value['discountPrice'] != null)
                                                        <div class="col-xl-3 col-md-6 col-grid-box" id="product-item">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="lable-block">
                                                                        <span class="lable4">discount</span>
                                                                    </div>
                                                                    <div class="front">
                                                                        @foreach($value['images'] as $image)
                                                                            <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['path'] !!}/{!! $image['filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="cart-info cart-wrap">
                                                                        <button class="cart-button" data-target="{!! $value['slug'] !!}" title="Add to cart"><i class="ti-shopping-cart"></i></button>
                                                                        <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                                        <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                        <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}">
                                                                            <h6>{!! $value['name'] !!}</h6>
                                                                        </a>
                                                                        <h4>{!! $value['discountPrice'] !!} Lei <del>{!! $value['price'] !!} Lei</del></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-xl-3 col-md-6 col-grid-box" id="product-item">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        @foreach($value['images'] as $image)
                                                                            <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['path'] !!}/{!! $image['filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="cart-info cart-wrap">
                                                                        <button class="cart-button" data-target="{!! $value['slug'] !!}" title="Add to cart"><i class="ti-shopping-cart"></i></button>
                                                                        <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                                        <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                                        <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}">
                                                                            <h6>{!! $value['name'] !!}</h6>
                                                                        </a>
                                                                        <h4>{!! $value['price'] !!} Lei</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    @if(json_decode($categoryModel['products'], true) != null)
                                    <div class="load-more-sec"><button class="load-More btn btn-dark" data-category="{{ $categoryModel['category']['Slug'] }}" data-totalResult="{{ $categoryModel['productsCount'] }}">incarca mai multe</button></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->

@endsection
