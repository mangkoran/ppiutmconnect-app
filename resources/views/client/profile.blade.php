@extends('client.layout.main')
@section('title', 'Profile')
@section('content')
<!---
Insert Here
--->
<!---
Content
--->
<section id="profile" class="pt-vh">
<div class="container-fluid">
    <div class="card bordered-col-lg px-4">
        <h1 class="mt-4 ml-4 text-left">Profile</h1>
        <hr class="mx-4 mt-0">
        <div class="card-body">
            <div class="profile-container mb-4">
                <img class="border rounded-circle profile-avatar" src="{{asset('projectad/assets/img/profile.jpg')}}">
                <div class="profile-overlay rounded-circle">
                    <span class="text-avatar-profile">Change profile picture</span>
                </div>
            </div>

            <div class="row profile-show">
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5 pr-0">
                            <span class="d-inline"><i class="fas fa-user-tag mr-2"></i>Access Grant:</span>
                        </div>
                        <div class="col-7">
                            <span>
                            @if(Auth::user()->access_grant == 1)
                                Member
                            @elseif(Auth::user()->access_grant == 2)
                                Management
                            @elseif (Auth::user()->access_grant == 3)
                                Admin
                            @endif
                            </span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline 600"><i class="fas fa-user mr-2"></i>Matric No:</span>
                        </div>
                        <div class="col-7">
                            <span>{{ Auth::user()->matrix_card }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline"><i class="fas fa-id-badge mr-2"></i>Full Name:</span>
                        </div>
                        <div class="col-7">
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline"><i class="fas fa-envelope mr-2"></i>Email:</span>
                        </div>
                        <div class="col-7">
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline"><i class="fas fa-calendar-alt mr-2"></i>Batch:</span>
                        </div>
                        <div class="col-7">
                            <span>{{ Auth::user()->batch }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline"><i class="fas fa-university mr-2"></i>Program:</span>
                        </div>
                        <div class="col-7">
                            <span>{{ Auth::user()->program_code }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline"><i class="fas fa-graduation-cap mr-2"></i>Degree</span>
                        </div>
                        <div class="col-7">
                            <span>{{ Auth::user()->degree }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="col-12 mb-2 user-data">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <span class="d-inline"><i class="fas fa-map-marker-alt mr-2"></i>Address</span>
                        </div>
                        <div class="col-lg-6">
                            <span>{{ Auth::user()->address }}</span>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="mx-auto">
                  <a href="{{url('user-editprofile')}}"><button class="btn btn-std">Edit Profile</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
