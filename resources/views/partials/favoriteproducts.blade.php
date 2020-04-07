
<!-- Tab product -->
<div class="title1 section-t-space">
    <h4>best seller</h4>
    <h2 class="title-inner1">PRODUSE POPULARE</h2>
</div>
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <div class="tab-content-cls">
                        <div id="tab-4" class="tab-content active default">
                            <div class="no-slider row">

                                @empty($favoriteproducts)
                                <div class="product-box">
                                    <div class="product-detail">
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Nu exista produse favorite</h6>
                                        </a>
                                    </div>
                                </div>
                                @else
                                    @foreach(json_decode($favoriteproducts, true) as $key => $value)
                                        @if($value['discountPrice'] != null)
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="lable-block"><span class="lable3">nou</span> <span class="lable4">discount</span></div>
                                                <div class="front">
                                                    @foreach($value['images'] as $image)
                                                        <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['path'] !!}/{!! $image['filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    @endforeach
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button id="addtocart" data-target="{!! $value['slug'] !!}" title="Adauga in cos"><i class="ti-shopping-cart" data-target="{!! $value['slug'] !!}"></i></button>
                                                    <a href="javascript:void(0)" title="Adauga in Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                    <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}" title="Vizualizare"><i class="ti-search" aria-hidden="true"></i></a> </a></div>
                                                </div>
                                            <div class="product-detail">
                                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}">
                                                    <h6>{!! $value['name'] !!}</h6>
                                                </a>
                                                <h4>{!! $value['discountPrice'] !!} Lei <del>{!! $value['price'] !!} Lei</del></h4>
                                            </div>
                                        </div>
                                        @else
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    @foreach($value['images'] as $image)
                                                        <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['path'] !!}/{!! $image['filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    @endforeach
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button id="addtocart" data-target="{!! $value['slug'] !!}" title="Adauga in cos"><i class="ti-shopping-cart" data-target="{!! $value['slug'] !!}"></i></button>
                                                    <a href="javascript:void(0)" title="Adauga in Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                    <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}" title="Vizualizare"><i class="ti-search" aria-hidden="true"></i></a> </a></div>
                                                </div>
                                            <div class="product-detail">
                                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                <a href="{{ route('productdetails', ['slug' => $value['slug']]) }}">
                                                    <h6>{!! $value['name'] !!}</h6>
                                                </a>
                                                <h4>{!! $value['price'] !!} Lei</h4>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endempty

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tab product end -->
