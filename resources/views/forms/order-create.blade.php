<form action="{{isset($route)?$route:route('dashboard.orders.store')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="User_ID" class="font-weight-bold">Asigneaza client utilizator (optional)</label>
                <select class="form-control {{ $errors->has('User_ID') ? ' is-invalid' : '' }}" name="User_ID" id="User_ID">
                    <option value="" disabled selected>---- Alege User ---</option>

                    @foreach($users as $item)
                        <option value="{{$item['id']}}">{{$item['firstname']}} {{$item['lastname']}}</option>
                    @endforeach
                </select>

                @if($errors->has('User_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('User_ID') }}</strong>
                </div>
                @endif
            </div>

            <div class="col">
                <label for="UserAddress_ID" class="font-weight-bold">Adresa client utilizator (optional)</label>
                <select class="form-control {{ $errors->has('UserAddress_ID') ? ' is-invalid' : '' }}" name="UserAddress_ID" id="UserAddress_ID">
                    <option value="" disabled selected>---- Alege adresa predefinita ---</option>
                </select>

                @if($errors->has('UserAddress_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('UserAddress_ID') }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>

    <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Date client (daca clientul nu are cont)</h6>
    <div class="form-group">
        <label for="Address" class="font-weight-bold">Adresa Completa Client</label>
        <input type="text" class="form-control {{ $errors->has('Address') ? ' is-invalid' : '' }}" name="Address" id="Address" value="" placeholder="" maxlength="255">
        @if($errors->has('Address'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Address') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="ZipCode" class="font-weight-bold">Cod Postal</label>
                <input type="text" class="form-control {{ $errors->has('ZipCode') ? ' is-invalid' : '' }}" name="ZipCode" id="ZipCode" value="" placeholder="" maxlength="255">
                @if($errors->has('ZipCode'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('ZipCode') }}</strong>
                    </div>
                @endif
            </div>

            <div class="col">
                <label for="Telephone" class="font-weight-bold">Numar telefon</label>
                <input type="text" class="form-control {{ $errors->has('Telephone') ? ' is-invalid' : '' }}" name="Telephone" id="Telephone" value="" placeholder="" maxlength="255">
                @if($errors->has('Telephone'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('Telephone') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="Email" class="font-weight-bold">Email client</label>
                <input type="text" class="form-control {{ $errors->has('Email') ? ' is-invalid' : '' }}" name="Email" id="Email" value="" placeholder="" maxlength="255">
                @if($errors->has('Email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('Email') }}</strong>
                    </div>
                @endif
            </div>

            <div class="col">
                <label for="ContactName" class="font-weight-bold">Nume contact</label>
                <input type="text" class="form-control {{ $errors->has('ContactName') ? ' is-invalid' : '' }}" name="ContactName" id="ContactName" value="" placeholder="" maxlength="255">
                @if($errors->has('ContactName'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('ContactName') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-bottom:20px;">Iteme comanda</h6>

    <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Adauga produse la comanda</h6>
    <div class="table-responsive">
        <table class="table table-bordered table-striped orderitems_table" id="orderitems_table">
            <thead>
                <tr>
                    <th>Produs</th>
                    <th>Cantitate</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-bottom:10px;">Detalii Comanda</h6>
    <div class="form-group">
        <div class="form-row">
            <div class="col-sm-4">
                <label for="PaymentType_ID" class="font-weight-bold">Tip de plata</label>
                <select class="form-control {{ $errors->has('PaymentType_ID') ? ' is-invalid' : '' }}" name="PaymentType_ID" id="PaymentType_ID">
                    @foreach($paymentTypes as $item)
                        <option value="{{$item['id']}}">{{$item['Name']}}</option>
                    @endforeach
                </select>

                @if($errors->has('PaymentType_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('PaymentType_ID') }}</strong>
                </div>
                @endif
            </div>

            <div class="col-sm-4">
                <label for="ShipmentStatus_ID" class="font-weight-bold">Status livrare</label>
                <select class="form-control {{ $errors->has('ShipmentStatus_ID') ? ' is-invalid' : '' }}" name="ShipmentStatus_ID" id="ShipmentStatus_ID">
                    @foreach($shipmentStatuses as $item)
                        <option value="{{$item['id']}}">{{$item['Name']}}</option>
                    @endforeach
                </select>

                @if($errors->has('PaymentType_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('PaymentType_ID') }}</strong>
                </div>
                @endif
            </div>

            <div class="col-sm-4">
                <label for="OrderStatus_ID" class="font-weight-bold">Status comanda</label>
                <select class="form-control {{ $errors->has('OrderStatus_ID') ? ' is-invalid' : '' }}" name="OrderStatus_ID" id="OrderStatus_ID">
                    @foreach($statuses as $item)
                        <option value="{{$item['id']}}">{{$item['Name']}}</option>
                    @endforeach
                </select>

                @if($errors->has('OrderStatus_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('OrderStatus_ID') }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="ShipCharge" class="font-weight-bold">Cost transport</label>
                <div class="input-group">
                    <input type="ShipCharge" class="form-control {{ $errors->has('ShipCharge') ? ' is-invalid' : '' }}" min="0" name="ShipCharge" id="ShipCharge" value="0" placeholder="" maxlength="255" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupPrepend">Lei</span>
                    </div>
                    @if($errors->has('ShipCharge'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('ShipCharge') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col">
                <label for="TotalValue" class="font-weight-bold">Total de plata</label>
                <div class="input-group">
                    <input type="TotalValue" class="form-control {{ $errors->has('TotalValue') ? ' is-invalid' : '' }}" min="0" name="TotalValue" id="TotalValue" value="0" placeholder="" maxlength="255" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupPrepend">Lei</span>
                    </div>
                    @if($errors->has('TotalValue'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('TotalValue') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari Comanda</h6>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Confirmed" id="ConfirmedCheckboxInput" value="0">
            <input type="checkbox" id="ConfirmedCheckbox">
            <div class="state p-success">
                <label class="font-weight-bold">Comanda confirmata</label>
            </div>
            @if($errors->has('Confirmed'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('Confirmed') }}</strong>
                </div>
            @endif
        </div>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Archived" id="ArchivedCheckBoxInput" value="0">
            <input type="checkbox" id="ArchivedCheckBox">
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

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>

    </div>
</form>
