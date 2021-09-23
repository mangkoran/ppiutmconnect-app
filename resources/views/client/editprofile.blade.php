@extends('client.layout.main')
@section('title', 'Edit Profile')
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
            <form method="POST" action="{{ route('updateProfile') }}" method="POST">
            @csrf
            <div class="row profile-show">

                <div class="col-lg-6 col-sm-12 col-md-6 mb-2 user-data">
                    <div class="row">
                        <div class="col-5">
                            <span class="d-inline 600"><i class="fas fa-user-tag mr-2"></i>Access Grant:</span>
                        </div>
                        <div class="col-7">
                            <input class="profile-input" type="text" name="accessgrant" id="accessGrant"
                            @if(Auth::user()->access_grant == 1)
                                placeholder="Member"
                            @elseif(Auth::user()->access_grant == 2)
                                placeholder="Management"
                            @elseif (Auth::user()->access_grant == 3)
                                placeholder="Admin"
                            @endif
                            disabled>
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
                            <input type="text" name="matricNo" id="matricNo" class="profile-input" placeholder="{{ Auth::user()->matrix_card }}" disabled>
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
                            <input type="text" name="fullName" id="fullName" class="profile-input" placeholder="{{ Auth::user()->name }}" disabled>
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
                            <input type="email" name="email" id="email" class="profile-input" value="{{ Auth::user()->email }}">
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
                            <input type="text" name="batch" id="batch" class="profile-input" placeholder="{{ Auth::user()->batch }}" disabled>
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
                            <input type="text" name="program" id="program" class="profile-input" placeholder="{{ Auth::user()->program_code }}" disabled>
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
                            <input type="text" name="degree" id="degree" class="profile-input" placeholder="{{ Auth::user()->degree }}" disabled>
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
                            <textarea name="address" id="address" cols="30" rows="10" class="profile-input">{{ Auth::user()->address }}</textarea>
                        </div>
                    </div>
                    <hr class="mt-0">
                </div>
                <input type="text" name="route" id="route" value="user-profile" hidden>
                <div class="mx-auto">
                    <input type="submit" class="btn btn-red" value="Submit">
                    <a class="btn btn-form-cancel" href="{{ route('user-profile') }}">Cancel</a>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
</section>

@endsection
