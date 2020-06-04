
<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu border-section border-top-0">
                    <div class="menu-left">
                        <div class="navbar"><a href="javascript:void(0)" onclick="openNav()"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i></a>
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                <nav>
                                    <a href="javascript:void(0)" onclick="closeNav()">
                                        <div class="sidebar-back text-left"><i class="fa fa-angle-left pr-2" aria-hidden="true"></i> Back</div>
                                    </a>
                                    <!-- Vertical Menu -->
                                    <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="{{ route('paymentMethods') }}">Modalitati de plata</a></li>
                                        <li><a href="{{ route('delivery') }}">Informatii livrare</a></li>
                                        <li><a href="{{ route('cookiesPolicy') }}">Politica cookies</a></li>
                                        <li><a href="{{ route('gdpr') }}">Protectia datelor cu caracter personal GDPR</a></li>
                                        <li><a href="https://anpc.ro/">ANPC</a></li>
                                        <li><a href="https://ec.europa.eu/consumers/odr/main/index.cfm">ODR</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="brand-logo layout2-logo">
                        <a href="{{ route('home') }}"><img src="{{ URL::to('/') }}/images/logos/logo-nightandday-2.png" class="img-fluid blur-up lazyload" alt=""></a>
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
                                <li class="onhover-div mobile-cart">
                                    @include('partials.cart-icon')
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
