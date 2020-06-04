@extends('dashboard.layout.layout')

@section('content')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
@endpush
 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Vizualizare comanda configurator
                        <small>Verifica datele comenzii.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Comenzi</li>
                    <li class="breadcrumb-item active">Vizualizare comanda configurator</li>
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
                    <h5>Vizualizare comanda configurator</h5>
                </div>
                <div class="card-body">
                <a href="{{ route('dashboard.orders.configurator') }}" type="button" class="btn btn-default" style="background-color:#0a7df3;color:white;margin-bottom: 20px;">Inapoi Lista Comenzi</a>
                <form>
                    <div class="form-group">
                        <label for="Address" class="font-weight-bold">Email client</label>
                        <input type="text" class="form-control" name="Address" id="Address" value="{{ $model->Email != null ? $model->Email : 'Nu exista email setat' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="Sponge" class="font-weight-bold">Tip burete</label>
                        <input type="text" class="form-control" name="Sponge" id="Sponge" value="{{ $model->Sponge != null ? $model->Sponge : 'Nu exista burete setat' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="Cover" class="font-weight-bold">Tip husa</label>
                        <input type="text" class="form-control" name="Cover" id="Cover" value="{{ $model->Cover != null ? $model->Cover : 'Nu exista husa setat' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="lenght" class="font-weight-bold">Lungime saltea</label>
                        <input type="text" class="form-control" name="lenght" id="lenght" value="{{ $model->lenght != null ? $model->lenght : 'Nu exista lungime setat' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="width" class="font-weight-bold">Latime saltea</label>
                        <input type="text" class="form-control" name="width" id="width" value="{{ $model->width != null ? $model->width : 'Nu exista latime setat' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="font-weight-bold">Cantitate dorita (buc)</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $model->quantity != null ? $model->quantity : 'Nu exista cantitate setat' }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="observation">Observatii</label>
                        <textarea class="form-control" id="observation" name="observation" rows="3">{{ $model->observations != null ? $model->observations : 'Nu exista observatii.' }}</textarea>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
