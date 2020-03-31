
<section class="section-b-space ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col-12 title2" style="text-align:unset;">
                <h2 class="title-inner2" style="font-size: 30px;">Produse similare</h2></div>
        </div>
        <div class="row search-product">
            @empty($similarProducts)
            <div class="product-box">
                <div class="product-detail">
                    <a href="product-page(no-sidebar).html">
                        <h6>Nu exista produse similare</h6>
                    </a>
                </div>
            </div>
            @else
                @foreach(json_decode($similarProducts, true) as $key => $value)
                    @if($value['DiscountPrice'] != null)
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable4">discount</span></div>
                                <div class="front">
                                    @foreach($value['images'] as $image)
                                        <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    @endforeach
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}">
                                    <h6>{!! $value['Name'] !!}</h6>
                                </a>
                                <h4>{!! $value['DiscountPrice'] !!} Lei <del>{!! $value['Price'] !!} Lei</del></h4>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    @foreach($value['images'] as $image)
                                        <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    @endforeach
                                </div>
                                <div class="cart-info cart-wrap">
                                    <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}">
                                    <h6>{!! $value['Name'] !!}</h6>
                                </a>
                                <h4>{!! $value['Price'] !!} Lei</h4>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endempty

        </div>
    </div>
</section>
