<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="nighandday">
    <meta name="keywords" content="nighandday">
    <meta name="author" content="YesAgency">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::to('/') }}/images/favicon/5.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/images/favicon/5.png" type="image/x-icon">
    <title>Night & Day by 4Brands Official - Website</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Styles -->
    <!--Fontawesome-->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css">

    <!--Slick slider css-->
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet" type="text/css">

    <!-- Animate icon -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Themify icon -->
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme css -->    
    <link href="{{ asset('css/color5.css') }}" rel="stylesheet" type="text/css" media="screen" id="color">

</head>

<body>


<!-- header start -->
<header class="header-2">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Bine ati venit pe Night & Day</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Relatii cu clientii: 0262 5483</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="#" style="color: #18335B;font-weight:bold;"><i class="fa fa-heart" aria-hidden="true" style="color:#ff0000;"></i> wishlist</a></li>
                        <li class="onhover-dropdown mobile-account" style="font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i> Contul meu
                        @guest
                            <ul class="onhover-show-div" style="width: 200px;">
                                <li><a href="{{ route('login') }}" data-lng="en"><i class="fa fa-sign-in fa-xs" aria-hidden="true"></i> Autentificare</a></li>
                                <li><a href="{{ route('register') }}" data-lng="en"><i class="fa fa-user-plus fa-xs" aria-hidden="true"></i> Inregistrare</a></li>
                            </ul>
                        @else
                            <ul class="onhover-show-div" style="width: 200px;">
                                <lh><h6>Salut, {{ Auth::user()->name }}<h6></lh>
                                <li class="divider"></li>
                                <li><a href="#" data-lng="en"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Comenzile mele</a></li>
                                <li><a href="#" data-lng="en"><i class="fa fa-gift" aria-hidden="true"></i> Voucherele mele</a></li>
                                <li><a href="#" data-lng="en"><i class="fa fa-star" aria-hidden="true"></i> Reviews</a></li>                                
                                <li><a href="#" data-lng="en"><i class="fa fa-certificate" aria-hidden="true"></i> Garantiile mele</a></li>                                                               
                                <li><a href="#" data-lng="en"><i class="fa fa-user-circle-o"></i> Date personale</a></li>                                                                                             
                                <li><a href="#" data-lng="en"><i class="fa fa-cog" aria-hidden="true"></i> Setari cont</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true" style="color: red;"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>
                        @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu border-section border-top-0">
                    <div class="menu-left">                       
                    </div>
                    <div class="brand-logo layout2-logo">
                        <a href="#"><img src="{{ URL::to('/') }}/images/logos/logo-nightandday-2.png" class="img-fluid blur-up lazyload" alt=""></a>
                    </div>
                    <div class="menu-right pull-right">
                        <div class="icon-nav">
                            <ul>
                                <li class="onhover-div mobile-search">
                                    <div><img src="{{ URL::to('/') }}/images/icon/search.png" onclick="openSearch()" class="img-fluid blur-up lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
                                    <div id="search-overlay" class="search-overlay">
                                        <div><span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                            <div class="overlay-content">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <form>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="onhover-div mobile-setting">
                                    <div><img src="{{ URL::to('/') }}/images/icon/setting.png" class="img-fluid blur-up lazyload" alt=""> <i class="ti-settings"></i></div>
                                    <div class="show-div setting">
                                        <h6>language</h6>
                                        <ul>
                                            <li><a href="#">english</a></li>
                                            <li><a href="#">french</a></li>
                                        </ul>
                                        <h6>currency</h6>
                                        <ul class="list-inline">
                                            <li><a href="#">euro</a></li>
                                            <li><a href="#">rupees</a></li>
                                            <li><a href="#">pound</a></li>
                                            <li><a href="#">doller</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="onhover-div mobile-cart">
                                    <div><img src="{{ URL::to('/') }}/images/icon/cart.png" class="img-fluid blur-up lazyload" alt=""> <i class="ti-shopping-cart"></i></div>
                                    <ul class="show-div shopping-cart">
                                        <li>
                                            <div class="media">
                                                <a href="#"><img class="mr-3" src="{{ URL::to('/') }}/images/furniture/product/4.jpg" alt=""></a>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h4>item name</h4>
                                                    </a>
                                                    <h4><span>1 x $ 299.00</span></h4>
                                                </div>
                                            </div>
                                            <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <a href="#"><img class="mr-3" src="{{ URL::to('/') }}/images/furniture/product/10.jpg" alt=""></a>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h4>item name</h4>
                                                    </a>
                                                    <h4><span>1 x $ 299.00</span></h4>
                                                </div>
                                            </div>
                                            <div class="close-circle"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                        </li>
                                        <li>
                                            <div class="total">
                                                <h5>subtotal : <span>$299.00</span></h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="buttons"><a href="cart.html" class="view-cart">view cart</a> <a href="#" class="checkout">checkout</a></div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-nav-center">
                    <nav id="main-nav">
                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                        <!-- Sample menu definition -->
                        <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                            <li>
                                <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                            </li>
                            <li>
                                <a href="#" style="color:#E8D056;">Home</a>                               
                            </li>                            
                            <li class="mega" id="hover-cls"><a href="#">Produse
                                <div class="lable-nav">nou</div>
                            </a>
                                <ul class="mega-menu full-mega-menu">
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col mega-box">
                                                    <div class="link-section">
                                                        <div class="menu-title">
                                                            <h5>portfolio</h5></div>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li><a href="grid-2-col.html">portfolio grid 2</a></li>
                                                                <li><a href="grid-3-col.html">portfolio grid 3</a></li>
                                                                <li><a href="grid-4-col.html">portfolio grid 4</a></li>
                                                                <li><a href="masonary-2-grid.html">mesonary grid 2</a></li>
                                                                <li><a href="masonary-3-grid.html">mesonary grid 3</a></li>
                                                                <li><a href="masonary-4-grid.html">mesonary grid 4</a></li>
                                                                <li><a href="masonary-fullwidth.html">mesonary full width</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mega-box">
                                                    <div class="link-section">
                                                        <div class="menu-title">
                                                            <h5>add to cart</h5></div>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li><a href="nursery.html">cart modal popup</a></li>
                                                                <li><a href="vegetables.html">qty. counter <i class="fa fa-bolt icon-trend" aria-hidden="true"></i></a></li>
                                                                <li><a href="bags.html">cart top</a></li>
                                                                <li><a href="shoes.html">cart bottom</a></li>
                                                                <li><a href="watch.html">cart left</a></li>
                                                                <li><a href="tools.html">cart right</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mega-box">
                                                    <div class="link-section">
                                                        <div class="menu-title">
                                                            <h5>theme elements</h5></div>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li><a href="element-title.html">title</a></li>
                                                                <li><a href="element-banner.html">collection banner</a></li>
                                                                <li><a href="element-slider.html">home slider</a></li>
                                                                <li><a href="element-category.html">category</a></li>
                                                                <li><a href="element-service.html">service</a></li>
                                                                        <li><a href="element-image-ratio.html">image size ratio <i class="fa fa-bolt icon-trend" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mega-box">
                                                    <div class="link-section">
                                                        <div class="menu-title">
                                                            <h5>product elements</h5></div>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li class="up-text"><a href="element-productbox.html">product box<span>10+</span></a></li>
                                                                <li><a href="element-product-slider.html">product slider</a></li>
                                                                <li><a href="element-no_slider.html">no slider</a></li>
                                                                <li><a href="element-mulitiple_slider.html">multi slider</a></li>
                                                                <li><a href="element-tab.html">tab</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col mega-box">
                                                    <div class="link-section">
                                                        <div class="menu-title">
                                                            <h5>email template   </h5></div>
                                                        <div class="menu-content">
                                                            <ul>
                                                                <li><a href="email-order-success.html">order success</a></li>
                                                                <li><a href="email-order-success-two.html">order success 2</a></li>
                                                                <li><a href="email-template.html">email template</a></li>
                                                                <li><a href="email-template-two.html">email template 2</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Tehnologii</a>
                                <ul>
                                    <li><a href="category-page.html">left sidebar</a></li>
                                    <li><a href="category-page(right).html">right sidebar</a></li>
                                    <li><a href="category-page(no-sidebar).html">no sidebar</a></li>
                                    <li><a href="category-page(sidebar-popup).html">sidebar popup</a></li>
                                    <li><a href="category-page(metro).html">metro <span class="new-tag">new</span></a></li>
                                    <li><a href="category-page(full-width).html">full width <span class="new-tag">new</span></a></li>
                                    <li><a href="category-page(infinite-scroll).html">infinite scroll</a></li>
                                    <li><a href=category-page(3-grid).html>three grid</a></li>
                                    <li><a href="category-page(6-grid).html">six grid</a></li>
                                    <li><a href="category-page(list-view).html">list view</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">noutati</a>
                            </li>
                            <li>
                                <a href="#">despre noi</a>
                            </li>
                            <li>
                                <a href="#">contact</a>
                            </li>
                            <li>
                                <a href="#" style="color: #18335B;font-weight: bold;">make your own</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

    <main>
        @yield('content')
    </main>

        

<!-- footer -->
<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="form-inline subscribe-form auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                              target="_blank">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                            </div>
                            <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ URL::to('/') }}/images/logos/logo-nightandday-2.png" alt=""></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>my account</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">mens</a></li>
                                <li><a href="#">womens</a></li>
                                <li><a href="#">clothing</a></li>
                                <li><a href="#">accessories</a></li>
                                <li><a href="#">featured</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>why we choose</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">shipping & return</a></li>
                                <li><a href="#">secure shopping</a></li>
                                <li><a href="#">gallary</a></li>
                                <li><a href="#">affiliates</a></li>
                                <li><a href="#">contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>store information</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>Multikart Demo Store, Demo store India 345-659</li>
                                <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                <li><i class="fa fa-envelope-o"></i>Email Us: <a href="#">Support@Fiot.com</a></li>
                                <li><i class="fa fa-fax"></i>Fax: 123456</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p style="color:#18335B;font-weight:bold;"><i class="fa fa-copyright" aria-hidden="true"></i> 2020 Copyright Night&Day. Website powered by YesAgency</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img"><img src="{{ URL::to('/') }}/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>Women Pink Shirt</h2>
                            <h3>$32.96</h3>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                            </div>
                            <div class="product-description border-product">
                                <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="#">s</a></li>
                                        <li><a href="#">m</a></li>
                                        <li><a href="#">l</a></li>
                                        <li><a href="#">xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">view detail</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->

<!-- Add to cart modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body modal1">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg addtocart">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="media">
                                    <a href="#">
                                        <img class="img-fluid blur-up lazyload pro-img" src="{{ URL::to('/') }}/images/fashion/product/43.jpg" alt="">
                                    </a>
                                    <div class="media-body align-self-center text-center">
                                        <a href="#">
                                            <h6>
                                                <i class="fa fa-check"></i>Item
                                                <span>men full sleeves</span>
                                                <span> successfully added to your Cart</span>
                                            </h6>
                                        </a>
                                        <div class="buttons">
                                            <a href="#" class="view-cart btn btn-solid">Your cart</a>
                                            <a href="#" class="checkout btn btn-solid">Check out</a>
                                            <a href="#" class="continue btn btn-solid">Continue shopping</a>
                                        </div>

                                        <div class="upsell_payment">
                                            <img src="{{ URL::to('/') }}/images/payment_cart.png" class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-section">
                                    <div class="col-12 product-upsell text-center">
                                        <h4>Customers who bought this item also.</h4>
                                    </div>
                                    <div class="row" id="upsell_product">
                                        <div class="product-box col-sm-3 col-6">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="#">
                                                        <img src="{{ URL::to('/') }}/images/fashion/product/1.jpg" class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                    </a>
                                                </div>
                                                <div class="product-detail">
                                                    <h6><a href="#"><span>cotton top</span></a></h6>
                                                    <h4><span>$25</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-box col-sm-3 col-6">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="#">
                                                        <img src="{{ URL::to('/') }}/images/fashion/product/34.jpg" class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                    </a>
                                                </div>
                                                <div class="product-detail">
                                                    <h6><a href="#"><span>cotton top</span></a></h6>
                                                    <h4><span>$25</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-box col-sm-3 col-6">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="#">
                                                        <img src="{{ URL::to('/') }}/images/fashion/product/13.jpg" class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                    </a>
                                                </div>
                                                <div class="product-detail">
                                                    <h6><a href="#"><span>cotton top</span></a></h6>
                                                    <h4><span>$25</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-box col-sm-3 col-6">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="#">
                                                        <img src="{{ URL::to('/') }}/images/fashion/product/19.jpg" class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                    </a>
                                                </div>
                                                <div class="product-detail">
                                                    <h6><a href="#"><span>cotton top</span></a></h6>
                                                    <h4><span>$25</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add to cart modal popup end-->


<!-- tap to top start -->
<div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>
<!-- tap to top end -->

<!-- Scripts -->
<!-- latest jquery-->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>

<!-- popper js-->
<script src="{{ asset('js/popper.min.js') }}" defer></script>

<!-- slick js-->
<script src="{{ asset('js/slick.js') }}" defer></script>

<!-- menu js-->
<script src="{{ asset('js/menu.js') }}" defer></script>

<!-- lazyload js-->
<script src="{{ asset('js/lazysizes.min.js') }}" defer></script>

<!-- Bootstrap js-->
<script src="{{ asset('js/bootstrap.js') }}" defer></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('js/bootstrap-notify.min.js') }}" defer></script>

<!-- Theme js-->
<script src="{{ asset('js/script.js') }}" defer></script>

<script>
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>
</body>

</html>