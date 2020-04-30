<form action="{{isset($route)?$route:route('dashboard.attributes.values.update')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="AttributeValueID" value="{{$model->id}}"/>

    <div class="form-group">
        <label for="Value" class="font-weight-bold">Valoare predefinita</label>
        <input type="text" class="form-control {{ $errors->has('Value') ? ' is-invalid' : '' }}" name="Value" id="Value" value="{{$model->Value}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Value'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Value') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="Attribute_ID" class="font-weight-bold">Atribut asignat</label>
        <select class="form-control {{ $errors->has('Attribute_ID') ? ' is-invalid' : '' }}" name="Attribute_ID" id="Attribute_ID">
            @if($model->Attribute_ID == null)
            <option value="" disabled selected>---- Alege atributul ---</option>
            @else
            <option value="" disabled>---- Alege atributul ---</option>
            @endif
            @foreach($attributes as $item)
                @if ($item['id'] == $model->Attribute_ID)
                <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                @else
                <option value="{{$item['id']}}">{{$item['Name']}}</option>
                @endif
            @endforeach
        </select>

        @if($errors->has('Attribute_ID'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('Attribute_ID') }}</strong>
        </div>
        @endif
    </div>

    <div class="form-group text-right">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>
    </div>
</form>
