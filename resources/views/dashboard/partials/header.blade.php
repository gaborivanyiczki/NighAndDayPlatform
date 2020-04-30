<!-- Header Start-->
<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none">
            <div class="logo-wrapper"><a href="{{ route('dashboard.home') }}"><img class="blur-up lazyloaded" src="{{ URL::to('/') }}/images/dashboard/logo-nightandday-2.png" alt=""></a></div>
        </div>
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <form class="form-inline search-form">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Cautare.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                        </div>
                    </form>
                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                <li class="onhover-dropdown"><a class="txt-dark" href="#">
                    <h6>RO</h6></a>
                    <ul class="language-dropdown onhover-show-div p-20">
                        <li><a href="#" data-lng="ro"><i class="flag-icon flag-icon-ro"></i> Romanian</a></li>
                    </ul>
                </li>
                <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li>Notificari <span class="badge badge-pill badge-primary pull-right">3</span></li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Disponibil doar premium..!</h6>
                                    <p class="mb-0">Acest feature este disponibil pentru conturile premium.</p>
                                </div>
                            </div>
                        </li>
                        <li class="txt-dark"><a href="#">Toate notificarile</a></li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{ URL::to('/') }}/images/dashboard/man.png" alt="header-user">
                        <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href="{{ route('dashboard.user.profile') }}"><i data-feather="user"></i>Editeaza cont</a></li>
                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
<!-- Header Ends -->
