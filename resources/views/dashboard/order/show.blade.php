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
                    <h3>Vizualizare comanda
                        <small>Verifica datele comenzii.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Comenzi</li>
                    <li class="breadcrumb-item active">Vizualizare comanda</li>
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
                    <h5>Vizualizare comanda</h5>
                </div>
                <div class="card-body">
                <a href="{{ route('dashboard.orders') }}" type="button" class="btn btn-default" style="background-color:#0a7df3;color:white;margin-bottom: 20px;">Inapoi Lista Comenzi</a>
                <form>
                    <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Date client cu cont activ</h6>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="UserName" class="font-weight-bold">Client inregistrat</label>
                            <input type="text" class="form-control" value="{{ $model->ClientName != null ? $model->ClientName : 'Comanda efectuata fara cont' }}" readonly>
                            </div>
                            <div class="col">
                                <label for="Email" class="font-weight-bold">Email client inregistrat</label>
                            <input type="text" class="form-control" value="{{ $model->ClientEmail != null ? $model->ClientEmail : 'Comanda efectuata fara cont' }}" readonly>
                            </div>
                        </div>
                    </div>

                    <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Date de livrare</h6>
                    <div class="form-group">
                        <label for="Address" class="font-weight-bold">Adresa Completa Client</label>
                        <input type="text" class="form-control" name="Address" id="Address" value="{{ $model->OrderAddress != null ? $model->OrderAddress : 'Nu exista adresa' }}" readonly>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="ZipCode" class="font-weight-bold">Cod Postal</label>
                                <input type="text" class="form-control" name="ZipCode" id="ZipCode" value="{{ $model->OrderPostalCode != null ? $model->OrderPostalCode : 'Nu exista cod postal' }}" readonly>
                            </div>

                            <div class="col">
                                <label for="Telephone" class="font-weight-bold">Numar telefon</label>
                                <input type="text" class="form-control" name="Telephone" id="Telephone" value="{{ $model->OrderTelephone != null ? $model->OrderTelephone : 'Nu exista nr de telefon' }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="Email" class="font-weight-bold">Email client</label>
                                <input type="text" class="form-control" name="Email" id="Email" value="{{ $model->OrderEmail != null ? $model->OrderEmail : 'Nu exista email' }}" readonly>
                            </div>

                            <div class="col">
                                <label for="ContactName" class="font-weight-bold">Nume contact</label>
                                <input type="text" class="form-control" name="ContactName" id="ContactName" value="{{ $model->OrderContactName != null ? $model->OrderContactName : 'Nu exista nume setat' }}" readonly >
                            </div>
                        </div>
                    </div>

                    <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Date de facturare</h6>
                        <div class="form-group">
                            <label for="Address" class="font-weight-bold">Adresa Completa Client</label>
                            <input type="text" class="form-control" name="Address" id="Address" value="{{ $model->OrderInvoiceAddress != null ? $model->OrderInvoiceAddress : 'Nu exista adresa' }}" readonly>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="ZipCode" class="font-weight-bold">Cod Postal</label>
                                    <input type="text" class="form-control" name="ZipCode" id="ZipCode" value="{{ $model->OrderInvoicePostalCode != null ? $model->OrderInvoicePostalCode : 'Nu exista cod postal' }}" readonly>
                                </div>

                                <div class="col">
                                    <label for="Telephone" class="font-weight-bold">Numar telefon</label>
                                    <input type="text" class="form-control" name="Telephone" id="Telephone" value="{{ $model->OrderInvoiceTelephone != null ? $model->OrderInvoiceTelephone : 'Nu exista nr de telefon' }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="Email" class="font-weight-bold">Email client</label>
                                    <input type="text" class="form-control" name="Email" id="Email" value="{{ $model->OrderInvoiceEmail != null ? $model->OrderInvoiceEmail : 'Nu exista email' }}" readonly>
                                </div>

                                <div class="col">
                                    <label for="ContactName" class="font-weight-bold">Nume contact</label>
                                    <input type="text" class="form-control" name="ContactName" id="ContactName" value="{{ $model->OrderInvoiceContactName != null ? $model->OrderInvoiceContactName : 'Nu exista nume setat' }}" readonly >
                                </div>
                            </div>
                        </div>

                    <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-bottom:20px;">Produse comandate</h6>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Produs</th>
                                    <th>Cantitate</th>
                                    <th>Pret / buc</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model->OrderItems as $item)
                                    <tr>
                                        <td>{{ $item->Name }}</td>
                                        <td>{{ $item->Quantity }}</td>
                                        <td>{{ $item->ProductPrice }} Lei</td>
                                        <td>{{ $item->Total }} Lei</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-bottom:10px;">Detalii Comanda</h6>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-4">
                                <label for="PaymentType_ID" class="font-weight-bold">Tip de plata</label>
                                <input type="text" class="form-control" name="PaymentType_ID" id="PaymentType_ID" value="{{ $model->PaymentType != null ? $model->PaymentType : 'Nu exista setat' }}" readonly>

                            </div>
                            <div class="col-sm-4">
                                <label for="ShipmentStatus_ID" class="font-weight-bold">Status livrare</label>
                                <input type="text" class="form-control" name="ShipmentStatus_ID" id="ShipmentStatus_ID" value="{{ $model->ShipmentStatus != null ? $model->ShipmentStatus : 'Nu exista setat' }}" readonly>

                            </div>
                            <div class="col-sm-4">
                                <label for="OrderStatus_ID" class="font-weight-bold">Status comanda</label>
                                <input type="text" class="form-control" name="OrderStatus_ID" id="OrderStatus_ID" value="{{ $model->OrderStatus != null ? $model->OrderStatus : 'Nu exista status' }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-xs-6">
                                <label for="ShipCharge" class="font-weight-bold">Cost transport</label>
                                <div class="input-group">
                                <input type="text" class="form-control" name="ShipCharge" id="ShipCharge" value="{{ $model->OrderShipCharge != null ? $model->OrderShipCharge : '0' }}" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="inputGroupPrepend">Lei</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="TotalValue" class="font-weight-bold">Total de plata</label>
                                <div class="input-group">
                                <input type="TotalValue" class="form-control" name="TotalValue" id="TotalValue" value="{{ $model->OrderTotal != null ? $model->OrderTotal : '0' }}" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="inputGroupPrepend">Lei</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari Comanda</h6>
                        <div class="pretty p-switch p-fill">
                            <input type="hidden" name="Confirmed" id="ConfirmedCheckboxInput" value="{{old('Confirmed', $model->Confirmed) === 1 ? 1 : 0 }}">
                            <input type="checkbox" id="ConfirmedCheckbox" {{ old('Confirmed', $model->Confirmed) === 1 ? 'checked' : '' }} readonly>
                            <div class="state p-success">
                                <label class="font-weight-bold">Comanda confirmata</label>
                            </div>
                        </div>
                        <div class="pretty p-switch p-fill">
                            <input type="hidden" name="Archived" id="ArchivedCheckBoxInput" value="{{old('Archived', $model->Archived) === 1 ? 1 : 0 }}">
                            <input type="checkbox" id="ArchivedCheckBox" {{ old('Archived', $model->Archived) === 1 ? 'checked' : '' }} readonly>
                            <div class="state p-success">
                                <label class="font-weight-bold">Comanda arhivata</label>
                            </div>
                              @if($errors->has('Archived'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('Archived') }}</strong>
                            </div>
                          @endif
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
