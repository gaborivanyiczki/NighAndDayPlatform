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
                        <li class="mobile-wishlist"><a href="#" style="color: #18335B;font-weight:bold;"><i class="fa fa-heart" aria-hidden="true" style="color:#ff0000;"></i> Wishlist</a></li>
                        @guest
                        <li class="mobile-account" style="font-weight: bold;"><a href="{{ route('login') }}" style="color: #18335B;font-weight:bold;"><i class="fa fa-user" aria-hidden="true"></i> Contul meu</a></li>
                        @else
                            @role('administrator')
                            <li class="mobile-wishlist"><a href="{{ route('dashboard.home') }}" style="color: #18335B;font-weight:bold;"><i class="fa fa-pencil" aria-hidden="true"></i> Administrare</a></li>
                            @endrole
                            <li class="onhover-dropdown mobile-account" style="font-weight: bold;"><a href="{{ route('myaccount') }}" style="color: #18335B;font-weight:bold;"><i class="fa fa-user" aria-hidden="true"></i> Contul meu</a>
                                <ul class="onhover-show-div" style="width: 200px;">
                                    <lh><h6>Salut, {{ Auth::user()->firstname }} {{Auth::user()->lastname}}<h6></lh>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('myaccount') }}" data-lng="ro">Informatii cont</a></li>
                                    <li><a href="{{ route('myaddresses') }}" data-lng="ro">Adrese personale</a></li>
                                    <li><a href="{{ route('myorders') }}" data-lng="ro">Comenzile mele</a></li>
                                    <li><a href="{{ route('myvouchers') }}" data-lng="ro">Voucherele mele</a></li>
                                    <li><a href="{{ route('mywarranties') }}" data-lng="ro">Garantiile mele</a></li>
                                    <li><a href="{{ route('myreviews') }}" data-lng="ro">Review-urile mele</a></li>
                                    <li><a href="{{ route('user.settings') }}" data-lng="ro">Setari cont</a></li>
                                    <li><a href="{{ route('mysubscriptions') }}" data-lng="ro">Abonarile mele</a></li>
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
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
