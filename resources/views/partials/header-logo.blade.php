
<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu border-section border-top-0">
                    <div class="menu-left">
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
