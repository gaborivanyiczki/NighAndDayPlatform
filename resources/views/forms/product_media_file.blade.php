<form action="{{isset($route)?$route:route('product_media_files.store')}}" method="POST" >
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
        <label for="Path">Path</label>
        <input type="text" class="form-control {{ $errors->has('Path') ? ' is-invalid' : '' }}" name="Path" id="Path" value="{{old('Path',$model->Path)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('Path'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Path') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="Filename">Filename</label>
        <input type="text" class="form-control {{ $errors->has('Filename') ? ' is-invalid' : '' }}" name="Filename" id="Filename" value="{{old('Filename',$model->Filename)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('Filename'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Filename') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="UploadedBy">UploadedBy</label>
        <input type="text" class="form-control {{ $errors->has('UploadedBy') ? ' is-invalid' : '' }}" name="UploadedBy" id="UploadedBy" value="{{old('UploadedBy',$model->UploadedBy)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('UploadedBy'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('UploadedBy') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('Default') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="Default"
           id="Default">
    <label class="form-check-label" for="Default">
        Default
    </label>
      @if($errors->has('Default'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Default') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>