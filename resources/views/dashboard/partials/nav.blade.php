<!-- Navigation Bar -->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="{{ route('dashboard.home') }}"><img class="blur-up lazyloaded" src="{{ URL::to('/') }}/images/dashboard/logo-nightandday-2.png" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{ URL::to('/') }}/images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{ Auth::user()->firstname }} {{Auth::user()->lastname}}</h6>
            <p>{{ Auth::user()->roles->pluck('name') }}</p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{ route('dashboard.home') }}"><i data-feather="home"></i><span>Acasa</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Produse</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Produse</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('dashboard.products') }}"><i class="fa fa-circle"></i>Lista Produse</a></li>
                            <li><a href="{{ route('wizard.product') }}"><i class="fa fa-circle"></i>Adauga Produs</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Categorii</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('dashboard.categories') }}"><i class="fa fa-circle"></i>Lista Categorii</a></li>
                            <li><a href="{{ route('dashboard.categories.create') }}"><i class="fa fa-circle"></i>Adauga Categorie</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Atribute</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('dashboard.attributes') }}"><i class="fa fa-circle"></i>Lista Atribute</a></li>
                            <li><a href="{{ route('dashboard.attributes.values') }}"><i class="fa fa-circle"></i>Lista Valori Atribute</a></li>
                            <li><a href="{{ route('dashboard.attributes.groups') }}"><i class="fa fa-circle"></i>Lista Grupuri Atribute</a></li>
                            <li><a href="{{ route('dashboard.attributes.create') }}"><i class="fa fa-circle"></i>Adauga Atribut</a></li>
                            <li><a href="{{ route('dashboard.attributes.values.create') }}"><i class="fa fa-circle"></i>Adauga Valoare Atribut</a></li>
                            <li><a href="{{ route('dashboard.attributes.groups.create') }}"><i class="fa fa-circle"></i>Adauga Grup Atribute</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Comenzi</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.orders') }}"><i class="fa fa-circle"></i>Gestionare Comenzi</a></li>
                    <li><a href="{{ route('dashboard.orders.configurator') }}"><i class="fa fa-circle"></i>Comenzi Configurator</a></li>
                    <li><a href="{{ route('dashboard.orders.archived') }}"><i class="fa fa-circle"></i>Comenzi Arhivate</a></li>
                    <li><a href="{{ route('dashboard.orders.create') }}"><i class="fa fa-circle"></i>Adauga comanda</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Vouchere</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.vouchers') }}"><i class="fa fa-circle"></i>Lista Vouchere</a></li>
                    <li><a href="{{ route('dashboard.vouchers.create') }}"><i class="fa fa-circle"></i>Adauga voucher</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Branduri</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.brands') }}"><i class="fa fa-circle"></i>Lista Branduri</a></li>
                    <li><a href="{{ route('dashboard.brands.create') }}"><i class="fa fa-circle"></i>Creeaza Brand</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="{{ route('dashboard.orders.invoices') }}"><i data-feather="archive"></i><span>Facturi</span></a>
            <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Utilizatori</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('dashboard.users') }}"><i class="fa fa-circle"></i>Lista Utilizatori</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>Setari Platforma</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Intrebari Frecvente</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('dashboard.faq') }}"><i class="fa fa-circle"></i>Lista de intrebari</a></li>
                            <li><a href="{{ route('dashboard.faq.create') }}"><i class="fa fa-circle"></i>Adauga Intrebare</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('dashboard.settings') }}"><i class="fa fa-circle"></i>Setari generale</a></li>
                </ul>
            </li>
            </li>
        </ul>
    </div>
</div>
<!-- Navigation Bar Ends-->
