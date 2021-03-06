@extends('dashboard.layout.layout')

@section('content')
@push('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
@endpush
@push('scripts')
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
@endpush

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Creeaza Produs Nou
                        <small>Creeaza un produs nou.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.products') }}">Produse</a></li>
                    <li class="breadcrumb-item active">Creeaza produs</li>
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
                <div class="card-header">
                    <h5>Informatii produs</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <a href="#" type="button" class="btn btn-default" style="background-color:#0a7df3;color:white;">Fisiere Media</a>
                        <a href="#" type="button" class="btn btn-primary">Atribute</a>
                    </div>
                    @include('forms.product-create',['route'=>route('dashboard.product.store'),'method'=>'POST'])
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<script>
    $(document).ready(function() {
        $('#FavoriteCheckbox').change(function() {
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
@endsection
