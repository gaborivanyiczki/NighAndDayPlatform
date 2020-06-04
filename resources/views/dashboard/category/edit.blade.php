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
                    <h3>Editare Categorie
                        <small>Editeaza categoria aleasa de tine.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories') }}">Categorii</a></li>
                    <li class="breadcrumb-item active">Editeaza categorie</li>
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
                    <h5>Informatii categorie</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('dashboard.categories') }}" type="button" class="btn btn-default" style="background-color:#0a7df3;color:white;">Inapoi Lista Categorii</a>
                    <div style="text-align:center;"><img src="{{ URL::to('/') }}/images/uploads/{!! $model->ImagePath !!}/{!! $model->ImageName !!}" alt="" class="img-fluid blur-up lazyload" style="width:200px;height:auto;"></div>
                    @include('forms.category',['route'=>route('dashboard.categories.update'),'method'=>'POST'])
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<script>
    $(document).ready(function() {
        $('#NewCheckBox').change(function() {
            if($(this).is(":checked")) {
                $('#NewCheckBoxInput').val(1);
            }else{
                $('#NewCheckBoxInput').val(0);
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
