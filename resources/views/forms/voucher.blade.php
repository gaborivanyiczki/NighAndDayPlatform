<form action="{{isset($route)?$route:route('dashboard.vouchers.update')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="VoucherID" value="{{$model->id}}"/>

    <div class="form-group">
        <label for="Code" class="font-weight-bold">Cod Voucher</label>
        <input type="text" class="form-control {{ $errors->has('Code') ? ' is-invalid' : '' }}" name="Code" id="Code" value="{{old('Code',$model->Code)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Code'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Code') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="Discount" class="font-weight-bold">Discount</label>
        <input type="number" class="form-control {{ $errors->has('Discount') ? ' is-invalid' : '' }}" name="Discount" id="Discount" value="{{old('Discount',$model->Discount)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Discount'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Discount') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="VoucherType_ID" class="font-weight-bold">Tip discount</label>
        <select class="form-control {{ $errors->has('VoucherType_ID') ? ' is-invalid' : '' }}" name="VoucherType_ID" id="VoucherType_ID">
            @if($model->VoucherType_ID == null)
                <option value="" disabled selected>---- Alege Tipul Discountului ---</option>
            @else
                <option value="" disabled>---- Alege Tipul Discountului ---</option>
            @endif
            @foreach($voucherTypes as $item)
                @if ($item['id'] == $model->VoucherType_ID)
                    <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                @else
                    <option value="{{$item['id']}}">{{$item['Name']}}</option>
                @endif
            @endforeach
        </select>
        @if($errors->has('VoucherType_ID'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('VoucherType_ID') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-row">
        <div class="col">
            <div class="form-group date" data-provide="datepicker">
                <label for="StartDate" class="font-weight-bold">Data Inceperii</label>
                <input class="datepicker-here form-control digits col-md-7" type="text" value="{{old('StartDate',$model->StartDate)}}" name="StartDate" data-language="en" data-date-format="yyyy-mm-dd" >
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group date" data-provide="datepicker">
                <label for="ExpiryDate" class="font-weight-bold">Data Expirarii</label>
                <input class="datepicker-here form-control digits col-md-7" type="text" value="{{old('ExpiryDate',$model->ExpiryDate)}}" name="ExpiryDate" data-language="en" data-date-format="yyyy-mm-dd" >
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari Voucher</h6>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Active" id="ActiveCheckboxInput" value="{{old('New', $model->Active) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="ActiveCheckBox" {{ old('type', $model->Active) === 1 ? 'checked' : '' }}>
            <div class="state p-success">
                <label class="font-weight-bold">Voucher Activ</label>
            </div>
            @if($errors->has('Active'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('Active') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>
    </div>
</form>
