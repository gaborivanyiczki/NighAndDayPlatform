
<!-- Tab product -->
<div class="title1 section-t-space">
    <h4>best seller</h4>
    <h2 class="title-inner1">produse populare</h2>
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
                                        @if($value['DiscountPrice'] != null)
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="lable-block"><span class="lable3">nou</span> <span class="lable4">discount</span></div>
                                                <div class="front">
                                                    @foreach($value['images'] as $image)
                                                        <a href="product-page(no-sidebar).html"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    @endforeach
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                                            </div>
                                            <div class="product-detail">
                                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>{!! $value['Name'] !!}</h6>
                                                </a>
                                                <h4>{!! $value['DiscountPrice'] !!} Lei <del>{!! $value['Price'] !!} Lei</del></h4>
                                                <ul class="color-variant">
                                                    <li class="bg-light0"></li>
                                                    <li class="bg-light1"></li>
                                                    <li class="bg-light2"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @else
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    @foreach($value['images'] as $image)
                                                        <a href="product-page(no-sidebar).html"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    @endforeach
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                                            </div>
                                            <div class="product-detail">
                                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>{!! $value['Name'] !!}</h6>
                                                </a>
                                                <h4>{!! $value['Price'] !!} Lei</h4>
                                                <ul class="color-variant">
                                                    <li class="bg-light0"></li>
                                                    <li class="bg-light1"></li>
                                                    <li class="bg-light2"></li>
                                                </ul>
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
