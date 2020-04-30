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
                    <h3>Creeaza Comanda Noua
                        <small>Creeaza o comanda noua.</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.orders') }}">Comenzi</a></li>
                    <li class="breadcrumb-item active">Creeaza comanda</li>
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
                    <h5>Informatii Comanda</h5>
                </div>
                <div class="card-body">
                    @include('forms.order-create',['route'=>route('dashboard.orders.store'),'method'=>'POST'])
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<script>
    $(document).ready(function() {
        $('#ConfirmedCheckBox').change(function() {
            if($(this).is(":checked")) {
                $('#ConfirmedCheckBoxInput').val(1);
            }else{
                $('#ConfirmedCheckBoxInput').val(0);
            }
        });
    });
    $(document).ready(function() {
        $('#ArchivedCheckbox').change(function() {
            if($(this).is(":checked")) {
                $('#ArchivedCheckBoxInput').val(1);
            }else{
                $('#ArchivedCheckBoxInput').val(0);
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        var count = 1;
        $.ajax({
            url: laroute.route('dashboard.orders.getProducts'),
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Product get successfull.')
                dynamic_field(count);

                function dynamic_field(number)
                {
                    html = '<tr>';
                       html += '<td> <select class="form-control" name="product_id['+number+']" id="product_id_'+number+'">';
                           html += '<option value="" disabled selected>---- Alege Produsul ---</option>';
                            $.each(response,function(index,value)
                            {
                                html += '<option value="'+ value.id +'">'+ value.Name +'</option>';
                            });
                           html += '</select> </td>';
                       html += '<td>';
                            html += '<input type="number" class="form-control" name="product_qty['+number+']" id="Quantity_'+number+'" value="0" placeholder="" maxlength="255" >';
                           html += '</td>';
                       if(number > 1)
                       {
                           html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Sterge Produs</button></td></tr>';
                           $('tbody').append(html);
                       }
                       else
                       {
                           html += '<td><button type="button" name="add" id="add" class="btn btn-success">Adauga Produs</button></td></tr>';
                           $('tbody').html(html);
                       }
                    /*$(document).on('change','#attribute_id_'+number+'', function () {
                        var _attributeId = $('#attribute_id_'+number+' option:selected').val();
                        $.ajax({
                            url: laroute.route('dashboard.attributes.getValues'),
                            type: 'GET',
                            dataType: 'json',
                            data:{
                                attribute:_attributeId,
                            },
                            success: function(response) {
                                var sel = $('#attribute_value_'+number+'');
                                sel.empty();
                                sel.append('<option value="" disabled selected>---- Alege Valoare ---</option>');
                                $.each(response,function(index,value)
                                {
                                    sel.append('<option value="'+ value.id +'">'+ value.Value +'</option>');
                                });

                            }
                        });
                    });*/
                }
                $(document).on('click', '#add', function(){
                    count++;
                    dynamic_field(count);
                });

                $(document).on('click', '.remove', function(){
                    count--;
                    $(this).closest("tr").remove();
                });
            }
        });
    });
    </script>
@endsection
