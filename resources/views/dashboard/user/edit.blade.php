@extends('dashboard.layout.layout')

@section('content')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
@endpush

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Editeaza utilizator
                        <small>Editeaza utilizatorul ales de tine.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Utilizator</li>
                    <li class="breadcrumb-item active">Editeaza utilizator</li>
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
                    <h5>Informatii Utilizator</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('dashboard.users') }}" type="button" class="btn btn-default" style="background-color:#0a7df3;color:white;margin-bottom: 20px;">Inapoi Lista Utilizatori</a>
                    @include('forms.user-edit',['route'=>route('dashboard.users.update'),'method'=>'POST'])
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<script>
    $(document).ready(function() {
        $('#ActiveCheckBox').change(function() {
            if($(this).is(":checked")) {
                $('#ActiveCheckboxInput').val(1);
            }else{
                $('#ActiveCheckboxInput').val(0);
            }
        });
    });
</script>
@endsection
