<form action="{{isset($route)?$route:route('dashboard.brands.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>

    <div class="form-group">
        <label>Adauga imagine</label>
        <input type="file" name="ImageName" class="form-control @error('ImageName') is-invalid @enderror">
        @error('ImageName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="Name" class="font-weight-bold">Denumire Brand</label>
        <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}" name="Name" id="Name" value="" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Name') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="Slug" class="font-weight-bold">Slug</label>
        <input type="text" class="form-control {{ $errors->has('Slug') ? ' is-invalid' : '' }}" name="Slug" id="Slug" value="" placeholder="" maxlength="255" required="required" >
        @if($errors->has('Slug'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Slug') }}</strong>
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
        <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari Brand</h6>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="Active" id="ActiveCheckboxInput" value="0">
            <input type="checkbox" id="ActiveCheckBox">
            <div class="state p-success">
                <label class="font-weight-bold">Brand Activ</label>
            </div>
            @if($errors->has('Active'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('Active') }}</strong>
                </div>
            @endif
        </div>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="New" id="NewCheckBoxInput" value="0">
            <input type="checkbox" id="NewCheckBox">
            <div class="state p-success">
                <label class="font-weight-bold">Brand Nou</label>
            </div>
              @if($errors->has('New'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('New') }}</strong>
            </div>
          @endif
        </div>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="WidgetShow" id="WidgetShowBoxInput" value="0">
            <input type="checkbox" id="WidgetShowBox">
            <div class="state p-success">
                <label class="font-weight-bold">Arata in meniu/widget</label>
            </div>
              @if($errors->has('WidgetShow'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('WidgetShow') }}</strong>
            </div>
          @endif
        </div>
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Goleste"/>
        <input type="submit" class="btn btn-primary" value="Salveaza"/>

    </div>
</form>
