
<form action="{{isset($route)?$route:route('dashboard.product.addProductImage')}}" class="dropzone digits" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="ProductID" value="{{$model->id}}"/>

    <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
        <h4 class="mb-0 f-w-600">Trageti fisierul aici sau apasati pentru incarcare.</h4>
    </div>
</form>
