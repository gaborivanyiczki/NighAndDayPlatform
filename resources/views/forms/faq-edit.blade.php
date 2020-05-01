<form action="{{isset($route)?$route:route('dashboard.faq.update')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="FaqID" value="{{$model->id}}"/>

    <div class="form-group">
        <label for="question" class="font-weight-bold">Intrebare</label>
        <input type="text" class="form-control {{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" id="question" value="{{old('question', $model->question)}}" placeholder="" maxlength="255" required="required" >
        @if($errors->has('question'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('question') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="description" class="font-weight-bold">Descriere</label>
        <textarea class="form-control summernote {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="6" id="description" placeholder="">{{old('description', $model->description)}}</textarea>
        @if($errors->has('description'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Setari</h6>
        <div class="pretty p-switch p-fill">
            <input type="hidden" name="active" id="ActiveCheckboxInput" value="{{old('active', $model->active) === 1 ? 1 : 0 }}">
            <input type="checkbox" id="ActiveCheckBox" {{ old('active', $model->active) === 1 ? 'checked' : '' }}>
            <div class="state p-success">
                <label class="font-weight-bold">Activ</label>
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
