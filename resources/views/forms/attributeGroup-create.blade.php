<form action="{{isset($route)?$route:route('dashboard.attributes.groups.store')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>

    <div class="form-group">
        <label for="Name" class="font-weight-bold">Denumire Grup</label>
        <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" id="Name" value="" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Name') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>

    </div>
</form>
