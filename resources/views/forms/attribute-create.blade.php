<form action="{{isset($route)?$route:route('dashboard.attributes.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>

    <div class="form-group">
        <label for="Name" class="font-weight-bold">Denumire Atribut</label>
        <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" id="Name" value="" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Name') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="Description" class="font-weight-bold">Descriere</label>
        <textarea class="form-control summernote {{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" rows="6" id="Description" placeholder="" ></textarea>
        @if($errors->has('Description'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Description') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="Attribute_Group_ID" class="font-weight-bold">Grup atribute</label>
        <select class="form-control {{ $errors->has('Attribute_Group_ID') ? ' is-invalid' : '' }}" name="Attribute_Group_ID" id="Attribute_Group_ID">
            <option value="" disabled selected>---- Alege grupul din care face parte ---</option>
            @foreach($groups as $item)
                <option value="{{$item['id']}}">{{$item['Name']}}</option>
            @endforeach
        </select>

        @if($errors->has('Attribute_Group_ID'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('Attribute_Group_ID') }}</strong>
        </div>
        @endif
    </div>


    <div class="form-group">
        <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari Atribut</h6>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Choosable" id="ChoosableCheckboxInput" value="0">
            <input type="checkbox" id="ChoosableCheckbox">
            <div class="state p-success">
                <label class="font-weight-bold">Atribut selectabil din pagina de produs</label>
            </div>
            @if($errors->has('Choosable'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('Choosable') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>

    </div>
</form>
