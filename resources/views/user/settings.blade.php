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
                        <li class="breadcrumb-item active" aria-current="page">Setari Cont</li>
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
                <div class="account-sidebar"><a class="popup-btn">Setari Cont</a></div>
                <div class="dashboard-left">
                    <div class="dashboard">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> inapoi</span></div>
                        <div class="block-content">
                            <ul>
                                <li><a href="{{ route('myaccount') }}">Informatii cont</a></li>
                                <li><a href="{{ route('myaddresses') }}">Adrese personale</a></li>
                                <li><a href="{{ route('myorders') }}">Comenzile mele</a></li>
                                <li><a href="{{ route('myvouchers') }}">Voucherele mele</a></li>
                                <li><a href="{{ route('mywarranties') }}">Garantiile mele</a></li>
                                <li><a href="{{ route('myreviews') }}">Review-urile mele</a></li>
                                <li class="active"><a href="#">Setari cont</a></li>
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
                                Acest panou este menit sa ofere posibilitatea de a edita datele contului dvs.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="box-account box-info">
                            <div class="box-head" style="margin-bottom: 8px;">
                                <h2>Setari Cont</h2></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Informatii personale</h3><a href="#" type="button" class="edit-modal" data-toggle="modal">Editeaza</a></div>
                                        <div class="box-content">
                                            <table class="table table-borderless">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <td style="font-weight: 700;">Nume complet:</td>
                                                      <td>{!! $userModel->fullname !!}</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="font-weight: 700;">Email implicit:</td>
                                                      <td>{!! $userModel->email !!}</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="font-weight: 700;">Telefon implicit:</td>
                                                      <td>{!! $userModel->telephone !!}</td>
                                                    </tr>
                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Parola mea</h3><a href="#" type="button" class="reset-password" data-toggle="modal" data-target="#resetUserPassword">Schimba Parola</a></div>
                                        <div class="box-content">
                                            <table class="table table-borderless">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td style="font-weight: 700;">Parola:</td>
                                                    <td>******** </td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

<div class="modal fade" id="editUserDetails" tabindex="-1" role="dialog" aria-labelledby="editUserDetailsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modifica detalii cont</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" class="theme-form" action="{{ route('user.edit.details') }}">
                @csrf
                <div class="form-group">
                    <input id="editAddressType" type="hidden" class="form-control" name="addressType" value="" required autofocus>
                </div>
                <div class="form-group">
                    <label for="editFirstName">Nume</label>
                    <input id="editFirstName" type="text" class="form-control @error('address') is-invalid @enderror" name="firstname" value="" required autofocus>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <div class="form-group">
                <label for="editLastName">Prenume</label>
                <input id="editLastName" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="lastname" value="" required autofocus>
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Telefon contact</label>
                    <input id="editTelephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="" autofocus>
                    @error('telephone')
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


<div class="modal fade" id="resetUserPassword" tabindex="-1" role="dialog" aria-labelledby="editUserDetailsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Resetare parola</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" class="theme-form" action="{{ route('user.reset.password') }}">
                @csrf
                <div class="form-group">
                    <input id="editAddressType" type="hidden" class="form-control" name="addressType" value="" required autofocus>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>
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
    $(document).on('click','.edit-modal',function(){
        var _url = laroute.route('getUserDetails');
        $.ajax({
            url: _url,
            type:'get',
            dataType:'json',
            success:function(response){
                $('#editFirstName').val(response.firstname);
                $('#editLastName').val(response.lastname);
                $('#editTelephone').val(response.telephone);

                $('#editUserDetails').modal('show');
            }
        });
    });
</script>
@endpush
