@extends('dashboard.layout.layout')

@section('content')
 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Profil
                        <small>Administrare cont</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active">Administrare cont</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-details text-center">
                        <img src="{{ URL::to('/') }}/images/dashboard/man.png" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                        <h5 class="f-w-600 mb-0">{{ $userDetails->firstname }} {{ $userDetails->lastname }}</h5>

                        <p>{{ $userDetails->roles->pluck('name') }}</p>
                        <div class="social">
                            <div class="form-group btn-showcase">
                                <button class="btn social-btn btn-fb d-inline-block"> <i class="fa fa-facebook"></i></button>
                                <button class="btn social-btn btn-twitter d-inline-block"><i class="fa fa-google"></i></button>
                                <button class="btn social-btn btn-google d-inline-block mr-0"><i class="fa fa-twitter"></i></button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="project-status">
                        <h5 class="f-w-600">Employee Status</h5>
                        <div class="media">
                            <div class="media-body">
                                <h6>Performance<span class="pull-right">80%</span></h6>
                                <div class="progress sm-progress-bar">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <h6>Overtime <span class="pull-right">60%</span></h6>
                                <div class="progress sm-progress-bar">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <h6>Leaves taken<span class="pull-right">70%</span></h6>
                                <div class="progress sm-progress-bar">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="mr-2"></i>Informatii Profil</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-edit-profile" role="tab" aria-controls="top-edit-profile" aria-selected="false"><i data-feather="settings" class="mr-2"></i>Editeaza Profil</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-reset-password" role="tab" aria-controls="top-reset-password" aria-selected="false"><i data-feather="settings" class="mr-2"></i>Reseteaza Parola</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Profil</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                    <tr>
                                        <td>Nume:</td>
                                        <td>{{ $userDetails->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Prenume:</td>
                                        <td>{{ $userDetails->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ $userDetails->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Numar telefon:</td>
                                        <td>{{ $userDetails->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Locatie:</td>
                                        <td>Romania</td>
                                    </tr>
                                    <tr>
                                        <td>Activ:</td>
                                        <td><i class="fa fa-{{$userDetails->active ? 'check' : 'times'}}" aria-hidden="true"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-edit-profile" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="account-setting">
                                <h5 class="f-w-600">Editeaza profil</h5>
                                <div class="row">
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-reset-password" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="account-setting">
                                <h5 class="f-w-600">Reseteaza parola</h5>
                                <div class="row">
                                    <div class="col">
                                        @include('forms.reset-password',['route'=>route('dashboard.user.reset.password'),'method'=>'POST'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
