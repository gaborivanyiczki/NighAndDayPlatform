@extends('dashboard.layout.layout')

@section('content')
@push('styles')
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.css') }}">
    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prism.css') }}">
    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chartist.css') }}">
@endpush
@push('scripts')
    <!--chartist js-->
    <script src="{{ asset('js/chart/chartist/chartist.js') }}"></script>
    <!--chartjs js-->
    <script src="{{ asset('js/chart/chartjs/chart.min.js') }}"></script>
    <!--copycode js-->
    <script src="{{ asset('js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('js/custom-card/custom-card.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/counter/counter-custom.js') }}"></script>
    <!--peity chart js-->
    <script src="{{ asset('js/chart/peity-chart/peity.jquery.js') }}"></script>
    <!--sparkline chart js-->
    <script src="{{ asset('js/chart/sparkline/sparkline.js') }}"></script>
    <!--dashboard custom js-->
    <script src="{{ asset('js/dashboard/default.js') }}"></script>
    <!--height equal js-->
    <script src="{{ asset('js/height-equal.js') }}"></script>
@endpush

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Panou de control
                        <small style="text-transform:none;">Sistemul de administrare al platformei</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Panou de control</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="box" class="font-warning"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Total comenzi noi</span>
                            <h3 class="mb-0"><span class="counter">{!! $ordersTotal !!}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Total comenzi</span>
                            <h3 class="mb-0"><span class="counter">{!! $ordersTotal !!}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="users" class="font-primary"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Total clienti inregistrati</span>
                            <h3 class="mb-0"><span class="counter">{!! $clientsTotal !!}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-danger card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="box" class="font-danger"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Total venituri (luna curenta)</span>
                            <h3 class="mb-0"><span class="counter">{!! $totalIncome !!}</span> Lei</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5>Statistici comenzi</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="market-chart"></div>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="market-chart"&gt;&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5>Ultimele comenzi</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-status table-responsive latest-order-table">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Nr comanda</th>
                                <th scope="col">Total</th>
                                <th scope="col">Metoda de plata</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($lastOrders as $item)
                                <tr>
                                    <td>#{{ $item->id }}</td>
                                    <td class="digits">{{ $item->TotalNet }} Lei</td>
                                    <td class="font-primary">{{ $item->PaymentType }}</td>
                                    <td class="digits">{{ $item->OrderStatus }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('dashboard.orders') }}" class="btn btn-primary">Vezi toate comenzile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total vanzari</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-3"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>42% <span><i class="fa fa-angle-up font-primary"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Vanzari luna trecuta</span>
                            <h2 class="mb-0">9054</h2>
                            <p>0.25% <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Crestere substantiala</h5>
                            <p>Acest feature este disponibil pentru conturile premium.</p>
                        </div>
                        <div class="bg-primary b-r-8">
                            <div class="small-box">
                                <i data-feather="briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total comenzi</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>20% <span><i class="fa fa-angle-up font-secondary"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Comenzi luna trecuta</span>
                            <h2 class="mb-0">2154</h2>
                            <p>0.13% <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Crestere substantiala</h5>
                            <p>Acest feature este disponibil pentru conturile premium.</p>
                        </div>
                        <div class="bg-secondary b-r-8">
                            <div class="small-box">
                                <i data-feather="credit-card"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total tranzactii cash</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-2"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>28% <span><i class="fa fa-angle-down font-warning"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Comenzi cu plata la livrare</span>
                            <h2 class="mb-0">2672</h2>
                            <p>0.8% <span><i class="fa fa-angle-down"></i></span></p>
                            <h5 class="f-w-600">Scadere substantiala</h5>
                            <p>Acest feature este disponibil pentru conturile premium.</p>
                        </div>
                        <div class="bg-warning b-r-8">
                            <div class="small-box">
                                <i data-feather="shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total tranzactii cu cardul</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-1"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>35% <span><i class="fa fa-angle-up font-danger"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Plata online cu cardul</span>
                            <h2 class="mb-0">0782</h2>
                            <p>0.25% <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Crestere substantiala</h5>
                            <p>Acest feature este disponibil pentru conturile premium.</p>
                        </div>
                        <div class="bg-danger b-r-8">
                            <div class="small-box">
                                <i data-feather="calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
