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
        $('#ConfirmedCheckbox').change(function() {
            if($(this).is(":checked")) {
                $('#ConfirmedCheckboxInput').val(1);
            }else{
                $('#ConfirmedCheckboxInput').val(0);
            }
        });
    });
    $(document).ready(function() {
        $('#ArchivedCheckBox').change(function() {
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
                            html += '<input type="number" min="1" class="form-control" name="product_qty['+number+']" id="Quantity_'+number+'" value="1" placeholder="" maxlength="255" readonly>';
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

                    $(document).on('change','#product_id_'+number+'', function () {
                        var _product = $('#product_id_'+number+' option:selected').val();
                        var _quantity = $('#Quantity_'+number+'').val();
                        var _currentTotal = $('#TotalValue').val();
                        $.ajax({
                            url: laroute.route('dashboard.orders.getProductPrice'),
                            type: 'GET',
                            dataType: 'json',
                            data:{
                                product:_product,
                                quantity:_quantity,
                                total: _currentTotal
                            },
                            success: function(response) {
                                $('#TotalValue').val(response.toFixed(2));
                            }
                        });
                    });
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
    <script>
        $(document).on('change','#User_ID', function () {
               var _userId = $('#User_ID option:selected').val();
               $.ajax({
                   url: laroute.route('dashboard.users.getUserAddress'),
                   type: 'GET',
                   dataType: 'json',
                   data:{
                       user:_userId,
                   },
                   success: function(response) {
                       var sel = $('#UserAddress_ID');
                       sel.empty();
                       sel.append('<option value="" disabled selected>---- Alege Adresa ---</option>');
                       $.each(response,function(index,value)
                       {
                           sel.append('<option value="'+ value.id +'">'+ value.Address +'</option>');
                       });

                    }
                });
            });
    </script>
    <script>
        $(document).on('focusin', '#ShipCharge', function(){
            $(this).data('val', $(this).val());
        }).on('change','#ShipCharge', function () {
               var prev = Number($(this).data('val'));
               var shipmentCost = Number($('#ShipCharge').val());
               var currentTotal = Number($('#TotalValue').val());
               currentTotal = currentTotal - prev;
               currentTotal = currentTotal + shipmentCost;

               $('#TotalValue').val(currentTotal.toFixed(2));
            });
    </script>
@endsection
