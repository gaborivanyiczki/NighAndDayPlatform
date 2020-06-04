@extends('layouts.app')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Finalizare comanda</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Finalizare comanda</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-b-space" style="background-color: white;">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="{{isset($route)?$route:route('finalizeOrder')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-12 title2" style="text-align:center;">
                                    <h2 class="title-inner2" style="font-size: 30px;">Date de facturare</h2>
                                </div>
                            </div>
                            <div class="row check-out">
                                @empty($invoiceAddresses)
                                @else
                                    <label for="InvoiceAddress_ID" class="font-weight-bold">Adresa de facturare utilizata</label>
                                    <select class="form-control {{ $errors->has('InvoiceAddress_ID') ? ' is-invalid' : '' }}" name="InvoiceAddress_ID" id="InvoiceAddress_ID">
                                        @foreach($invoiceAddresses as $item)
                                            <option value="{{ $item->AddressID }}">{{ $item->AddressTypeName }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('InvoiceAddress_ID'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('InvoiceAddress_ID') }}</strong>
                                    </div>
                                    @endif
                                @endempty
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                @empty($invoiceAddresses)
                                                    <li>
                                                        <h6>Nu exista adrese prestabilite.</h6>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="btn btn-info add-modal" data-toggle="modal" data-target="#addUserAddress"><i class="fa fa-plus"></i> Adauga Adresa</button>
                                                    </li>
                                                @else
                                                    @foreach ($invoiceAddresses as $item)
                                                    <li>
                                                        <div class="alert alert-info" role="alert">
                                                            <h6>{!! $item->AddressTypeName !!}</h6>
                                                            <address>{!! $item->Address !!} {!! $item->ZipCode !!}</address>
                                                            <address>{!! $item->Telephone !!}</address>
                                                            <address>{!! $item->ContactName !!}</address>
                                                            <button type="button" class="btn btn-light edit-modal" data-toggle="modal" data-target="{{ $item->AddressType }}">Modifica</button>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @if ($invoiceAddressAvailable > 0)
                                                    <li>
                                                        <button type="button" class="btn btn-info add-modal" data-toggle="modal" data-target="#addUserAddress"><i class="fa fa-plus"></i> Adauga Adresa</button>
                                                    </li>
                                                    @endif
                                                @endempty
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 title2" style="text-align:center;">
                                    <h2 class="title-inner2" style="font-size: 30px;">Date de livrare</h2>
                                </div>
                            </div>
                            <div class="row check-out">
                                @empty($deliveryAddresses)
                                @else
                                    <label for="DeliveryAddress_ID" class="font-weight-bold">Adresa de livrare utilizata</label>
                                    <select class="form-control {{ $errors->has('DeliveryAddress_ID') ? ' is-invalid' : '' }}" name="DeliveryAddress_ID" id="DeliveryAddress_ID">
                                        @foreach($deliveryAddresses as $item)
                                            <option value="{{ $item->AddressID }}">{{ $item->AddressTypeName }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('DeliveryAddress_ID'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('DeliveryAddress_ID') }}</strong>
                                    </div>
                                    @endif
                                @endempty
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                @empty($deliveryAddresses)
                                                    <li>
                                                        <h6>Nu exista adrese prestabilite.</h6>
                                                    </li>
                                                    <li><button type="button" class="btn btn-info add-modal" data-toggle="modal" data-target="#addUserAddress"><i class="fa fa-plus"></i> Adauga Adresa</button></li>
                                                @else
                                                    @foreach ($deliveryAddresses as $item)
                                                    <li>
                                                        <div class="alert alert-info" role="alert">
                                                            <h6>{!! $item->AddressTypeName !!}</h6>
                                                            <address>{!! $item->Address !!} {!! $item->ZipCode !!}</address>
                                                            <address>{!! $item->Telephone !!}</address>
                                                            <address>{!! $item->ContactName !!}</address>
                                                            <button type="button" class="btn btn-light edit-modal" data-toggle="modal" data-target="{{ $item->AddressType }}">Modifica</button>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @if ($deliveryAddressAvailable > 0)
                                                    <li>
                                                        <button type="button" class="btn btn-info add-modal" data-toggle="modal" data-target="#addUserAddress"><i class="fa fa-plus"></i> Adauga Adresa</button>
                                                    </li>
                                                    @endif
                                                @endempty
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details" style="margin-bottom: 15px;border-radius: 35px;">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Rezumat comanda</div>
                                    </div>
                                    <ul class="qty">
                                        @foreach (json_decode($cartModel, true) as $item)
                                            <li>{!! $item['quantity'] !!}x {!! $item['associatedModel']['Name'] !!}  <span>{!! $item['associatedModel']['DiscountPrice'] != null ? $item['quantity'] * $item['associatedModel']['DiscountPrice'] : $item['quantity'] * $item['associatedModel']['Price'] !!} Lei</span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">{!! $cartTotal !!} Lei</span></li>
                                        <li>Cost livrare <span style="position: relative;float: right;width:35%;font-size: 18px;font-weight: 400;">{{ $deliveryFee }} Lei</span></li>
                                        <input type="hidden" name="deliveryCost" style="display:none;" value="{{ $deliveryFee }}"/>
                                    </ul>
                                    <ul class="total">
                                        <li>Total de plata <span class="count">{!! number_format($cartTotal + $deliveryFee, 2,'.','') !!} Lei</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="hidden" name="cash-payment" id="cash-payment-input" value="1">
                                                        <input type="checkbox" class="radio" name="payment-group" id="cash-payment" checked>
                                                        <label>Ramburs la curier</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="hidden" name="card-payment" id="card-payment-input" value="0">
                                                        <input type="checkbox" class="radio" name="payment-group" id="card-payment">
                                                        <label>Plata online cu cardul</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right"><input type="submit" class="btn btn-solid" value="Plaseaza comanda"/></div>
                                </div>
                            </div>
                            <div class="checkout-details" style="margin-bottom: 15px;border-radius: 35px;">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Aplica Voucher</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="VoucherCode" class="font-weight-bold">Cod voucher</label>
                                            <input type="text" class="form-control" id="VoucherCode" value="" placeholder="Introduceti codul voucherului" maxlength="50">
                                            <div class="form-group text-right" style="margin-top: 10px;">
                                                <input type="button" class="btn btn-primary" id="ApplyVoucher" value="Aplica"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->


@if ($availableAddresses)
<!--Create Address Modal -->
<div class="modal fade" id="addUserAddress" tabindex="-1" role="dialog" aria-labelledby="addUserAddressTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Adauga adresa noua</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" class="theme-form" action="{{ route('user.add.adress.checkout') }}">
                @csrf
                <div class="form-group">
                    <label for="addresstype">Tip Adresa</label>
                    <select class="form-control" id="addressType" name="addressType">
                        <option value="" selected disabled>Selectati tipul adresei</option>
                        @foreach ($availableAddresses as $item)
                            <option value="{{ $item->AddressTypeCode }}">{!! $item->AddressTypeName !!}</option>
                        @endforeach
                    </select>
                    @error('addresstype')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Adresa Completa</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <div class="form-group">
                <label for="zipcode">Cod Postal</label>
                <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required autocomplete="address" autofocus>
                @error('zipcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Numar contact</label>
                    <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="address" autofocus>
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contactname">Nume contact</label>
                    <input id="contactname" type="text" class="form-control @error('contactname') is-invalid @enderror" name="contactname" value="{{ old('contactname') }}" autocomplete="address" autofocus>
                    @error('contactname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <div class="form-group">
                       <button type="submit" class="btn btn-solid btn-sm">Adauga</button>
               </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
</div>
@endif

<!--Edit Address Modal -->
<div class="modal fade" id="editUserAddress" tabindex="-1" role="dialog" aria-labelledby="editUserAddressTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modifica adresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" class="theme-form" action="{{ route('user.edit.adress.checkout') }}">
                @csrf
                <div class="form-group">
                    <input id="editAddressType" type="hidden" class="form-control" name="addressType" value="" autofocus>
                </div>
                <div class="form-group">
                    <label for="address">Adresa Completa</label>
                    <input id="editAddress" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <div class="form-group">
                <label for="zipcode">Cod Postal</label>
                <input id="editZipCode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="" autofocus>
                @error('zipcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Numar contact</label>
                    <input id="editTelephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="" autofocus>
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contactname">Nume contact</label>
                    <input id="editContactName" type="text" class="form-control @error('contactname') is-invalid @enderror" name="contactname" value="" autofocus>
                    @error('contactname')
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

@endsection
@push('head')
<script>
    $(document).ready(function() {
        $('#cash-payment-input').val(1);
        $("#card-payment").attr("disabled", true);
        $('#cash-payment').change(function() {
            if($(this).is(":checked")) {
                $('#cash-payment-input').val(1);
                $("#card-payment").attr("disabled", true);
            }else{
                $('#cash-payment-input').val(0);
                $("#card-payment").removeAttr("disabled");
            }
        });
    });
    $(document).ready(function() {
        $('#card-payment').change(function() {
            if($(this).is(":checked")) {
                $('#card-payment-input').val(1);
                $("#cash-payment").attr("disabled", true);
            }else{
                $('#card-payment-input').val(0);
                $("#cash-payment").removeAttr("disabled");
            }
        });
    });
</script>
<script>
    $(document).on('click','.edit-modal',function(){
        var _url = laroute.route('getUserAddress');
        var addressType = $(this).attr('data-target');
        $.ajax({
            url: _url,
            type:'get',
            dataType:'json',
            data:{
                id:addressType
            },
            success:function(response){
                $('#editAddressType').val(addressType);
                $('#editAddress').val(response.Address);
                $('#editZipCode').val(response.ZipCode);
                $('#editTelephone').val(response.Telephone);
                $('#editContactName').val(response.ContactName);

                $('#editUserAddress').modal('show');
            }
        });
    });

    $(document).on('click','.add-modal',function(){
        $('#addUserAddress').modal('show');
    });

    $(document).on('click','.remove-address',function(){
        var _url = laroute.route('removeUserAddress');
        var addressType = $(this).attr('data-target');
        $.ajax({
            url: _url,
            type:'post',
            dataType:'json',
            data:{
                id:addressType,
                '_token': '{{ csrf_token() }}',
            }
        });
    });
</script>
<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','#ApplyVoucher',function(){
        var _url = laroute.route('applyVoucher');
        var voucherCode = $("#VoucherCode").val();
        $.ajax({
            url: _url,
            type:'POST',
            dataType:'json',
            data:{
                VoucherCode:voucherCode
            },
            error: function (request, status, error) {
                alert(request.responseText);
            },
            success:function(response){
                document.location.reload(true);
            }
        });
    });
</script>
@endpush
