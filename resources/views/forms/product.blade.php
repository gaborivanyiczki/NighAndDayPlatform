
<form action="{{isset($route)?$route:route('dashboard.product.update')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="ProductID" value="{{$model->id}}"/>
        <div class="form-group">
        <label for="Name" class="font-weight-bold">Denumire produs</label>
        <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" id="Name" value="{{old('Name',$model->Name)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('Name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Name') }}</strong>
    </div>
  @endif
    </div>

    <div class="form-group">
        <label for="Slug" class="font-weight-bold">Slug</label>
        <input type="text" class="form-control {{ $errors->has('Slug') ? ' is-invalid' : '' }}" name="Slug" id="Slug" value="{{old('Slug',$model->Slug)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Slug'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Slug') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="ProductCode" class="font-weight-bold">Cod Produs</label>
                <input type="text" class="form-control {{ $errors->has('ProductCode') ? ' is-invalid' : '' }}" name="ProductCode" id="ProductCode" value="{{old('ProductCode',$model->ProductCode)}}" placeholder="" maxlength="50" >
                @if($errors->has('ProductCode'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('ProductCode') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col">
                <label for="Quantity" class="font-weight-bold">Cantitate stoc</label>
                <div class="input-group">
                    <input type="number" class="form-control {{ $errors->has('Quantity') ? ' is-invalid' : '' }}" name="Quantity" id="Quantity" value="{{old('Quantity',$model->Quantity)}}" placeholder="" required="required" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupPrepend">bucati</span>
                    </div>
                    @if($errors->has('Quantity'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('Quantity') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="Warranty" class="font-weight-bold">Garantie</label>
                <div class="input-group">
                    <input type="text" class="form-control {{ $errors->has('Warranty') ? ' is-invalid' : '' }}" name="Warranty" id="Warranty" value="{{old('Warranty',$model->Warranty)}}" placeholder="" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupPrepend">luni</span>
                    </div>
                    @if($errors->has('Warranty'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('Warranty') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="Return" class="font-weight-bold">Termen retur</label>
                <div class="input-group">
                    <input type="text" class="form-control {{ $errors->has('Return') ? ' is-invalid' : '' }}" name="Return" id="Return" value="{{old('Return',$model->Return)}}" placeholder="" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupPrepend">zile</span>
                    </div>
                    @if($errors->has('Return'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('Return') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="Delivery" class="font-weight-bold">Termen livrare</label>
                <div class="input-group">
                    <input type="text" class="form-control {{ $errors->has('Delivery') ? ' is-invalid' : '' }}" name="Delivery" id="Delivery" value="{{old('Delivery',$model->Delivery)}}" placeholder="" maxlength="50" >
                    <div class="input-group-append">
                        <span class="input-group-text" id="inputGroupPrepend">zile</span>
                    </div>
                    @if($errors->has('Delivery'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('Delivery') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="Description" class="font-weight-bold">Descriere</label>
        <textarea class="form-control summernote {{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" rows="6" id="Description" placeholder="" >{{old('Description',$model->Description)}}</textarea>
          @if($errors->has('Description'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('Description') }}</strong>
    </div>
  @endif
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="Price" class="font-weight-bold">Pret</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Lei</span>
                    </div>
                    <input type="text" class="form-control {{ $errors->has('Price') ? ' is-invalid' : '' }}" name="Price" id="Price" value="{{old('Price',$model->Price)}}" placeholder="" required="required" >
                    @if($errors->has('Price'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('Price') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col">
                <label for="DiscountPrice" class="font-weight-bold">Pret cu discount</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Lei</span>
                    </div>
                    <input type="text" class="form-control {{ $errors->has('DiscountPrice') ? ' is-invalid' : '' }}" name="DiscountPrice" id="DiscountPrice" value="{{old('DiscountPrice',$model->DiscountPrice)}}" placeholder="" >
                    @if($errors->has('DiscountPrice'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('DiscountPrice') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="Category_ID" class="font-weight-bold">Categorie</label>
                <select class="form-control {{ $errors->has('Category_ID') ? ' is-invalid' : '' }}" name="Category_ID" id="Category_ID">
                    @if($model->Category_ID == null)
                    <option value="" disabled selected>---- Alege Categorie ---</option>
                    @else
                    <option value="" disabled>---- Alege Categorie ---</option>
                    @endif
                    @foreach($categories as $item)
                        @if ($item['id'] == $model->Category_ID)
                        <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                        @else
                        <option value="{{$item['id']}}">{{$item['Name']}}</option>
                        @endif
                    @endforeach
                </select>

                @if($errors->has('Category_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('Category_ID') }}</strong>
                </div>
                @endif
            </div>

            <div class="col">
                <label for="Brand_ID" class="font-weight-bold">Brand</label>
                <select class="form-control {{ $errors->has('Brand_ID') ? ' is-invalid' : '' }}" name="Brand_ID" id="Brand_ID">
                    @if($model->Brand_ID == null)
                    <option value="" disabled selected>---- Alege Brand ---</option>
                    @else
                    <option value="" disabled>---- Alege Brand ---</option>
                    @endif
                    @foreach($brands as $item)
                        @if ($item['id'] == $model->Brand_ID)
                        <option value="{{$item['id']}}" selected>{{$item['Name']}}</option>
                        @else
                        <option value="{{$item['id']}}">{{$item['Name']}}</option>
                        @endif
                    @endforeach
                </select>

                @if($errors->has('Brand_ID'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('Brand_ID') }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari Produs</h6>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Active" id="ActiveCheckboxInput" value="{{old('New', $model->Active) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="ActiveCheckbox" {{ old('type', $model->Active) === 1 ? 'checked' : '' }}>
            <div class="state p-success">
                <label class="font-weight-bold">Produs Activ</label>
            </div>
              @if($errors->has('Active'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Active') }}</strong>
            </div>
          @endif
        </div>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Favorite" id="FavoriteCheckboxInput" value="{{old('Favorite', $model->Favorite) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="FavoriteCheckbox" {{ old('Favorite', $model->Favorite) === 1 ? 'checked' : '' }}>
            <div class="state p-success">
                <label class="font-weight-bold">Produs Favorit</label>
            </div>
              @if($errors->has('Favorite'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Favorite') }}</strong>
            </div>
          @endif
        </div>
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>

    </div>
</form>
