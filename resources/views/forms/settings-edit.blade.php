<form action="{{isset($route)?$route:route('dashboard.settings.update')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="SettingID" value="{{$model->id}}"/>

    <div class="form-group">
        <label for="Name" class="font-weight-bold">Denumire configuratie</label>
        <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" id="Name" value="{{old('Name', $model->Name)}}" placeholder="" maxlength="255" required="required" readonly>
        @if($errors->has('Name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Name') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="Value" class="font-weight-bold">Valoare</label>
        <input type="text" class="form-control {{ $errors->has('Value') ? ' is-invalid' : '' }}" name="Value" id="Value" value="{{old('Value', $model->Value)}}" placeholder="" maxlength="255" required="required">
        @if($errors->has('Value'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Value') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>
    </div>
</form>
