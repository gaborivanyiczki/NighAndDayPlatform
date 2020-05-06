@extends('dashboard.layout.layout')

@section('content')
@push('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
    <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/dropzone/dropzone.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
           $('.summernote').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                $('body > .note-popover').hide();
                }
             },
         });
      });
    </script>
    <!-- Dropzone js-->
@endpush

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Editare Produs
                        <small>Editeaza produsul ales de tine.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.products') }}">Produse</a></li>
                    <li class="breadcrumb-item active">Editeaza produs</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs" id="productEditTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="info-tab" data-toggle="tab" href="#product-info" role="tab" aria-controls="info" aria-selected="true">Informatii Produs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="attribute-tab" data-toggle="tab" href="#product-attribute" role="tab" aria-controls="attribute" aria-selected="false">Gestionare Atribute</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="attributes-create-tab" data-toggle="tab" href="#product-add-attributes" role="tab" aria-controls="attributes-create" aria-selected="false">Adauga Atribute</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" id="media-tab" data-toggle="tab" href="#product-media" role="tab" aria-controls="media" aria-selected="false">Media</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="product-info" role="tabpanel" aria-labelledby="info-tab">
                            @foreach($model->images as $image)
                                @if ($image->Default == 1)
                                <div style="text-align:center;"><img src="{{ URL::to('/') }}/images/uploads/{!! $image['Path'] !!}/{!! $image['Filename'] !!}" alt="" class="img-fluid blur-up lazyload" style="width:200px;height:auto;"></div>
                                @endif
                            @endforeach
                            @include('forms.product',['route'=>route('dashboard.product.update'),'method'=>'POST'])
                        </div>
                        <div class="tab-pane fade" id="product-attribute" role="tabpanel" aria-labelledby="attribute-tab">
                            <div class="content" style="margin-top: 20px;">
                                @include('forms.product-attribute-edit',['route'=>route('dashboard.product.updateAttributeGroup'),'method'=>'POST'])
                                <h6 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;">Lista curenta de atribute</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="edit_attributes_table">
                                        <thead>
                                            <tr>
                                                <th width="35%">Atribut</th>
                                                <th width="35%">Valoare atribut</th>
                                                <th width="30%">Actiune</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($attributes as $item)
                                                <tr>
                                                    <td>{{ $item->AttributeName }}</td>
                                                    <td>{{ $item->AttributeValue }}</td>
                                                    <td class="text-center">
                                                    <a class="btn btn-primary btn-xs btn mr-3 edit-modal" data-toggle="modal" data-target="#editProductAttribute" data-attribute="{{ $item->Attribute_ID }}" data-current-value="{{ $item->AttributeValue_ID }}" href="#"><i class="fa fa-edit"></i></a>
                                                        <form onsubmit="return confirm('Doresti sa stergi acest atribut?');" action="{{ route('dashboard.product.deleteAttribute', ['id' => $item->Attribute_ID, 'productId' => $item->Product_ID]) }}" method="get" style="display: contents;"><button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button></form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-add-attributes" role="tabpanel" aria-labelledby="product-add-attributes-tab">
                            <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-top:20px;">Adauga atribute produsului ales</h5>
                            @include('forms.product-attributes-create',['route'=>route('dashboard.product.addAttributes'),'method'=>'POST'])
                        </div>
                        <div class="tab-pane fade" id="product-media" role="tabpanel" aria-labelledby="media-tab">
                            <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-top:20px;">Adauga imagine noua</h5>
                            @include('forms.product-images',['route'=>route('dashboard.product.addProductImage'),'method'=>'POST'])
                            <h5 class="font-weight-bold" style="border-bottom: 2px solid #c5c0c0;margin-top:20px;">Lista imagini</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th scope="col">Previzualizare</th>
                                      <th scope="col">Denumire fisier</th>
                                      <th scope="col">Url</th>
                                      <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($model->images as $item)
                                        @if ($item->Default == 0)
                                            <tr>
                                                <td><img src="{{ URL::to('/') }}/images/uploads/{!! $item['Path'] !!}/{!! $item['Filename'] !!}" style="height: 50px; width: 50px;"></td>
                                                <td>{{ $item['Filename'] }}</td>
                                                <td>{{ URL::to('/') }}/images/uploads/{!! $item['Path'] !!}/{!! $item['Filename'] !!}</td>
                                                <td>  <form onsubmit="return confirm('Doresti sa stergi aceasta imagine?');" action="{{ route('dashboard.product.deleteImage', ['filename' => $item['Filename']])}}" method="get" style="display: contents;"><button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button></form></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<div class="modal fade" id="editProductAttribute" tabindex="-1" role="dialog" aria-labelledby="editProductAttributeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modifica atribut</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" class="theme-form" action="{{ route('dashboard.product.updateProductAttribute') }}">
                @csrf
                <div class="form-group">
                <input id="editProduct" type="hidden" class="form-control" name="ProductID" value="{{ $model->id }}" required readonly>
                <input id="originalAttributeValue" type="hidden" class="form-control" name="Original_Atribute_Value" value="" required>
                </div>
                <div class="form-group">
                    <label for="Atribute_ID">Atribut</label>
                    <input id="Atribute_ID" type="text" class="form-control @error('Atribute_ID') is-invalid @enderror" name="Atribute_ID" value="" required autofocus readonly>
                    @error('Atribute_ID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Attribute_Value">Valoare Atribut</label>
                    <select class="form-control {{ $errors->has('Attribute_Value') ? ' is-invalid' : '' }}" name="Attribute_Value" id="Attribute_Value">
                        <option value="">---- Alege Valoare ---</option>
                    </select>
                    @error('Attribute_Value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <div class="form-group">
                       <button type="submit" class="btn btn-solid btn-sm">Modifica</button>
               </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#FavoriteCheckBox').change(function() {
            if($(this).is(":checked")) {
                $('#FavoriteCheckBoxInput').val(1);
            }else{
                $('#FavoriteCheckBoxInput').val(0);
            }
        });
    });
    $(document).ready(function() {
        $('#ActiveCheckbox').change(function() {
            if($(this).is(":checked")) {
                $('#ActiveCheckboxInput').val(1);
            }else{
                $('#ActiveCheckboxInput').val(0);
            }
        });
    });
</script>
<script>
    $(document).on('click','.edit-modal',function(){
        var _url = laroute.route('dashboard.attributes.getValues');
        var _attribute = $(this).attr("data-attribute");
        var _currentValue = $(this).attr("data-current-value");
        $('#originalAttributeValue').val(_currentValue);
        $.ajax({
            url: _url,
            type:'get',
            dataType:'json',
            data: {
               attribute: _attribute
            },
            success:function(response){
                $('#Atribute_ID').val(_attribute);

                var sel = $('#Attribute_Value');
                sel.empty();
                sel.append('<option value="" disabled>---- Alege Valoare ---</option>');
                $.each(response,function(index,value)
                {
                    if (value.id === parseInt(_currentValue)) {
                        sel.append('<option value="'+ value.id +'" selected>'+ value.Value +'</option>');
                    } else {
                        sel.append('<option value="'+ value.id +'">'+ value.Value +'</option>');
                    }
                });
            }
        });
    });
</script>
@endsection
