@extends('layouts.app')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Contul meu</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acasa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adresele personale</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">Contul meu</a></div>
                <div class="dashboard-left">
                    <div class="dashboard">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> inapoi</span></div>
                        <div class="block-content">
                            <ul>
                                <li><a href="{{ route('myaccount') }}">Informatii cont</a></li>
                                <li class="active"><a href="#">Adrese personale</a></li>
                                <li><a href="{{ route('myorders') }}">Comenzile mele</a></li>
                                <li><a href="{{ route('myvouchers') }}">Voucherele mele</a></li>
                                <li><a href="{{ route('mywarranties') }}">Garantiile mele</a></li>
                                <li><a href="{{ route('myreviews') }}">Review-urile mele</a></li>
                                <li><a href="{{ route('user.settings') }}">Setari cont</a></li>
                                <li><a href="{{ route('mysubscriptions') }}">Abonarile mele</a></li>
                                <li class="last"><a style="color:red;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>Salut, {{ Auth::user()->firstname }} {{Auth::user()->lastname}}</h2>
                        </div>
                        <div class="welcome-msg">
                            <div class="alert alert-info" role="alert">
                                Acest panou este menit sa ofere posibilitatea de a edita sau adauga adresele tale personale.
                            </div>
                            <div class="alert alert-info" role="alert">
                                Setarea unei adrese implicite te va ajuta sa economisesti timp la finalizarea unei comenzi.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="box-account box-info">
                            <div class="box-head" style="margin-bottom: 8px;">
                                <h2>Adrese personale</h2>
                            </div>
                            <div class="row">
                                <table class="table table-borderless">
                                    <thead>
                                    </thead>
                                    <tbody>
                                       @empty($userAddresses)
                                            <tr>
                                                <td>
                                                    <h6>Nu exista adrese prestabilite.</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Adauga Adresa</button>
                                                </td>
                                            </tr>
                                       @else
                                            @foreach ($userAddresses as $item)
                                            <tr>
                                                <td>
                                                    <h6>{!! $item->AddressTypeName !!}</h6>
                                                    <div class="alert alert-info" role="alert">
                                                        <address>{!! $item->Address !!} {!! $item->ZipCode !!}</address>
                                                        <address>{!! $item->Telephone !!}</address>
                                                        <address>{!! $item->ContactName !!}</address>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-light edit-modal" data-toggle="modal" data-target="{{ $item->AddressType }}">Modifica</button>
                                                    <button type="button" class="btn btn-light remove-address" data-target="{{ $item->AddressType }}">Sterge</button>
                                                </td>
                                               </tr>
                                            @endforeach
                                            @if ($availableAddresses)
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addUserAddress"><i class="fa fa-plus"></i> Adauga Adresa</button>
                                                </td>
                                            </tr>
                                            @endif
                                       @endempty
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
            <form method="POST" class="theme-form" action="{{ route('user.add.adress') }}">
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
                       <button type="submit" class="btn btn-solid">Adauga</button>
               </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
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
            <form method="POST" class="theme-form" action="{{ route('user.edit.adress') }}">
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
                       <button type="submit" class="btn btn-solid">Modifica</button>
               </div>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
</div>

@endsection
@push('head')
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
@endpush
