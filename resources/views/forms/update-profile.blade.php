<form action="{{isset($route)?$route:route('dashboard.user.update.profile')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>

    <div class="form-group">
        <label for="firstname" class="font-weight-bold">Nume</label>
        <input type="text" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="firstname" value="{{old('firstname', $userDetails->firstname)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('firstname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('firstname') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="lastname" class="font-weight-bold">Prenume</label>
        <input type="text" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="lastname" value="{{old('lastname', $userDetails->lastname)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('lastname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('lastname') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="telephone" class="font-weight-bold">Numar telefon</label>
        <input type="text" class="form-control {{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" id="telephone" value="{{old('telephone', $userDetails->telephone)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('telephone'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('telephone') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="active" id="ActiveCheckboxInput" value="{{old('active', $userDetails->active) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="ActiveCheckBox" {{ old('active', $userDetails->active) === 1 ? 'checked' : '' }}>
            <div class="state p-success">
                <label class="font-weight-bold">Cont Activ</label>
            </div>
            @if($errors->has('active'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('active') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>
    </div>
</form>
