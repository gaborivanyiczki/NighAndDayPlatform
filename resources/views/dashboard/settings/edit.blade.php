@extends('dashboard.layout.layout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Editeaza configuratie
                        <small>Editeaza configuratia aleasa de tine.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Setari</li>
                    <li class="breadcrumb-item active">Editeaza configuratie</li>
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
                    <h5>Informatii Configuratie</h5>
                </div>
                <div class="card-body">
                    @include('forms.settings-edit',['route'=>route('dashboard.settings.update'),'method'=>'POST'])
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
