<form action="{{isset($route)?$route:route('dashboard.orders.update')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="OrderID" value="{{$order->id}}"/>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="User_ID" class="font-weight-bold">Asigneaza client utilizator (optional)</label>
                <select class="form-control {{ $errors->has('User_ID') ? ' is-invalid' : '' }}" name="User_ID" id="User_ID">
                    @if ($order->User_ID != null)
                        <option value="">---- Alege User ---</option>
                    @else
                        <option value="" selected>---- Alege User ---</option>
                    @endif

                    @foreach($users as $item)
                        @if ($item['id'] == $order->User_ID)
                            <option value="{{$item['id']}}" selected>{{$item['firstname']}} {{$item['lastname']}}</option>
                        @else
                            <option value="{{$item['id']}}">{{$item['firstname']}} {{$item['lastname']}}</option>
                        @endif
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
                    @if ($userAddresses != null)
                        @foreach($userAddresses as $item)
                            @if ($item['id'] == $order->UserAddress_ID)
                                <option value="{{$item['id']}}" selected>{{$item['Address']}}</option>
                            @else
                                <option value="{{$item['id']}}">{{$item['Address']}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected>---- Alege adresa predefinita ---</option>
                    @endif
                    <option value="">---- Alege adresa predefinita ---</option>
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
    <input type="text" class="form-control {{ $errors->has('Address') ? ' is-invalid' : '' }}" name="Address" id="Address" value="{{ $address->Address }}" placeholder="" maxlength="255" required="required" >
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
                <input type="text" class="form-control {{ $errors->has('ZipCode') ? ' is-invalid' : '' }}" name="ZipCode" id="ZipCode" value="{{ $address->ZipCode }}" placeholder="" maxlength="255" required="required" >
                @if($errors->has('ZipCode'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('ZipCode') }}</strong>
                    </div>
                @endif
            </div>

            <div class="col">
                <label for="Telephone" class="font-weight-bold">Numar telefon</label>
                <input type="text" class="form-control {{ $errors->has('Telephone') ? ' is-invalid' : '' }}" name="Telephone" id="Telephone" value="{{ $address->Telephone }}" placeholder="" maxlength="255" required="required" >
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
                <input type="text" class="form-control {{ $errors->has('Email') ? ' is-invalid' : '' }}" name="Email" id="Email" value="{{ $address->Email }}" placeholder="" maxlength="255" required="required" >
                @if($errors->has('Email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('Email') }}</strong>
                    </div>
                @endif
            </div>

            <div class="col">
                <label for="ContactName" class="font-weight-bold">Nume contact</label>
                <input type="text" class="form-control {{ $errors->has('ContactName') ? ' is-invalid' : '' }}" name="ContactName" id="ContactName" value="{{ $address->ContactName }}" placeholder="" maxlength="255" required="required" >
                @if($errors->has('ContactName'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('ContactName') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-bottom:10px;">Detalii Comanda</h6>
    <div class="form-group">
        <div class="form-row">
            <div class="col-sm-4">
                <label for="PaymentType_ID" class="font-weight-bold">Tip de plata</label>
                <select class="form-control {{ $errors->has('PaymentType_ID') ? ' is-invalid' : '' }}" name="PaymentType_ID" id="PaymentType_ID">
                    @foreach($paymentTypes as $item)
                        @if ($item['id'] == $order->PaymentType_ID)
                            <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                        @else
                            <option value="{{$item['id']}}">{{$item['Name']}}</option>
                        @endif
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
                        @if ($item['id'] == $order->ShipmentStatus_ID)
                            <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                        @else
                            <option value="{{$item['id']}}">{{$item['Name']}}</option>
                        @endif
                    @endforeach
                </select>

                @if($errors->has('ShipmentStatus_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('ShipmentStatus_ID') }}</strong>
                </div>
                @endif
            </div>

            <div class="col-sm-4">
                <label for="OrderStatus_ID" class="font-weight-bold">Status comanda</label>
                <select class="form-control {{ $errors->has('OrderStatus_ID') ? ' is-invalid' : '' }}" name="OrderStatus_ID" id="OrderStatus_ID">
                    @foreach($statuses as $item)
                        @if ($item['id'] == $order->OrderStatus_ID)
                            <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                        @else
                            <option value="{{$item['id']}}">{{$item['Name']}}</option>
                        @endif
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
                <input type="ShipCharge" class="form-control {{ $errors->has('ShipCharge') ? ' is-invalid' : '' }}" name="ShipCharge" id="ShipCharge" value="{{ $order->ShipCharge }}" placeholder="" maxlength="255" >
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
                    <input type="TotalValue" class="form-control {{ $errors->has('TotalValue') ? ' is-invalid' : '' }}" name="TotalValue" id="TotalValue" value="{{ $order->TotalNet }}" placeholder="" maxlength="255" >
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
            <input type="hidden" name="Confirmed" id="ConfirmedCheckboxInput" value="{{old('Confirmed', $order->Confirmed) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="ConfirmedCheckbox" {{ old('Confirmed', $order->Confirmed) === 1 ? 'checked' : '' }}>
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
            <input type="hidden" name="Archived" id="ArchivedCheckBoxInput" value="{{old('Archived', $order->Archived) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="ArchivedCheckBox" {{ old('type', $order->Archived) === 1 ? 'checked' : '' }}>
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
