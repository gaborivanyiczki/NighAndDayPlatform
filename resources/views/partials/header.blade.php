<div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>{!! $data ? $data[0]->Value : 'Undefined'  !!}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>{!! $data ? $data[1]->Value : 'Undefined'  !!}</li>
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