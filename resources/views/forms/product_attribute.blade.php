<form action="{{isset($route)?$route:route('product_attributes.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="Product_ID">Product ID</label>
    <select class="form-control {{ $errors->has('Product_ID') ? ' is-invalid' : '' }}" name="Product_ID" id="Product_ID">
        @if(isset($products))
@foreach ($products as $data)
<option value="{{$data->id}}" {{$data->id==$model->Product_ID?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('Product_ID'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Product_ID') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="Attribute_ID">Attribute ID</label>
    <select class="form-control {{ $errors->has('Attribute_ID') ? ' is-invalid' : '' }}" name="Attribute_ID" id="Attribute_ID">
        @if(isset($attributes))
@foreach ($attributes as $data)
<option value="{{$data->id}}" {{$data->id==$model->Attribute_ID?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('Attribute_ID'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Attribute_ID') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="Product_Attribute_Group_ID">Product Attribute Group ID</label>
    <select class="form-control {{ $errors->has('Product_Attribute_Group_ID') ? ' is-invalid' : '' }}" name="Product_Attribute_Group_ID" id="Product_Attribute_Group_ID">
        @if(isset($products_attributes_groups))
@foreach ($products_attributes_groups as $data)
<option value="{{$data->id}}" {{$data->id==$model->Product_Attribute_Group_ID?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('Product_Attribute_Group_ID'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Product_Attribute_Group_ID') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="Value">Value</label>
        <input type="text" class="form-control {{ $errors->has('Value') ? ' is-invalid' : '' }}" name="Value" id="Value" value="{{old('Value',$model->Value)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('Value'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Value') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="CreatedUser">CreatedUser</label>
        <input type="text" class="form-control {{ $errors->has('CreatedUser') ? ' is-invalid' : '' }}" name="CreatedUser" id="CreatedUser" value="{{old('CreatedUser',$model->CreatedUser)}}" placeholder="" maxlength="255" >
          @if($errors->has('CreatedUser'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('CreatedUser') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>