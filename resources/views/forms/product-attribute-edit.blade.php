<form action="{{isset($route)?$route:route('dashboard.product.updateAttributeGroup')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="ProductID" value="{{$model->id}}"/>

    <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Schimba grupul produsului</h6>
    <div class="form-group">
        <label for="Product_Attribute_Group_ID" class="font-weight-bold">Grup Produse</label>
        <select class="form-control {{ $errors->has('Product_Attribute_Group_ID') ? ' is-invalid' : '' }}" name="Product_Attribute_Group_ID" id="Product_Attribute_Group_ID">
            @if ($model->AttributeGroup_ID != null)
                <option value="">---- Alege Grup Produs ---</option>
            @else
                <option value="" selected>---- Alege Grup Produs ---</option>
            @endif

            @foreach($attributeGroups as $item)
                @if ($item['id'] == $model->AttributeGroup_ID)
                    <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                @else
                    <option value="{{$item['id']}}">{{$item['Name']}}</option>
                @endif
            @endforeach
        </select>

        @if($errors->has('Product_Attribute_Group_ID'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('Product_Attribute_Group_ID') }}</strong>
        </div>
        @endif
    </div>
    <div class="form-group text-right ">
        <input type="submit" class="btn btn-primary" value="Salveaza"/>
    </div>
</form>
