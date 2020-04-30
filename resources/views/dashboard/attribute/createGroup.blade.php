@extends('dashboard.layout.layout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Creeaza Grup de atribute
                        <small>Creeaza un group predefinit pentru atribute.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.attributes') }}">Atribute</a></li>
                    <li class="breadcrumb-item active">Creeaza grup atribute</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Informatii Grup Atribut</h5>
                </div>
                <div class="card-body">
                    @include('forms.attributeGroup-create',['route'=>route('dashboard.attributes.groups.store'),'method'=>'POST'])
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection
