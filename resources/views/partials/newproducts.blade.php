
<!-- product slider start -->
<section class="section-b-space tools-grey ratio_square">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title3">
                    <h2 class="title-inner3">Produse Noi</h2>
                    <div class="line"></div>
                </div>
                <div class="product-5 product-m no-arrow">

                    @empty ($newproducts)

                    <div class="product-box product-wrap">
                        <div class="product-info">
                            <a href="#"><h6>Nu exista produse active.</h6></a>
                        </div>
                    </div>

                    @else

                        @foreach(json_decode($newproducts, true) as $key => $value)

                            @if($value['DiscountPrice'] != null)
                            <div class="product-box product-wrap">
                                <div class="img-wrapper">
                                    <div class="ribbon"><span>nou</span></div>
                                    <div class="front">
                                    @foreach($value['images'] as $image)
                                        <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    @endforeach
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <a href="javascript:void(0)"  title="Adauga in Wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <button  title="Add to cart" onclick="openCart()"><i class="ti-shopping-cart"></i> Adauga in cos</button>
                                        <a href="compare.html" title="Compare"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        <a class="mobile-quick-view" href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="quick-view-part">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}"><h6>{!! $value['Name'] !!}</h6></a>
                                    <h4>{!! $value['DiscountPrice'] !!} Lei <del>{!! $value['Price'] !!} Lei</del></h4>
                                </div>
                            </div>

                            @else

                            <div class="product-box product-wrap">
                                <div class="img-wrapper">
                                    <div class="ribbon"><span>nou</span></div>
                                    <div class="front">
                                    @foreach($value['images'] as $image)
                                        <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    @endforeach
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <a href="javascript:void(0)"  title="Adauga in Wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <button  title="Add to cart" onclick="openCart()"><i class="ti-shopping-cart"></i> Adauga in cos</button>
                                        <a href="compare.html" title="Compare"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                        <a class="mobile-quick-view" href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="quick-view-part">
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="{{ route('productdetails', ['slug' => $value['Slug']]) }}"><h6>{!! $value['Name'] !!}</h6></a>
                                    <h4>{!! $value['Price'] !!} lei</h4>
                                </div>
                            </div>

                            @endif
                        @endforeach
                    @endempty

                </div>
            </div>
        </div>
    </div>
</section>
<!-- product slider end -->
