@extends('client.layout.main')
@section('content')

<section id="change-pass" class="pt-vh">
    <div class="container-fluid">
        <div class="card bordered-col-lg px-4">
            <h1 class="mt-4 ml-4 text-left">Change Password</h1>
            <hr class="mx-4 mt-0">
            <div class="card-body">
                <div class="change-pass-form-container">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="change-pass-form" method="POST" action="{{ route('changepass') }}">
                        @csrf

                        <div class="col-lg-12 col-sm-12 col-md-6 mb-2 user-data">
                            <div class="row">
                                <div class="col-4">
                                    <span class="d-inline"><i class="fas fa-envelope mr-2"></i>Email:</span>
                                </div>
                                <div class="col-8">
                                    <input type="email" name="email" id="email" class="profile-input" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-6 mb-2 user-data">
                            <div class="row">
                                <div class="col-4">
                                    <span class="d-inline"><i class="fas fa-lock mr-2"></i>Current Password:</span>
                                </div>
                                <div class="col-8">
                                    <input type="password" name="current_password" id="current_password" 
                                    class="profile-input form-control @error('current_password') is-invalid @enderror">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-6 mb-2 user-data">
                            <div class="row">
                                <div class="col-4">
                                    <span class="d-inline"><i class="fas fa-lock mr-2"></i>New Password:</span>
                                </div>
                                <div class="col-8">
                                    <input type="password" name="password" id="password" 
                                    class="profile-input form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-6 mb-2 user-data">
                            <div class="row">
                                <div class="col-4">
                                    <span class="d-inline"><i class="fas fa-lock mr-2"></i>Confirm Password:</span>
                                </div>
                                <div class="col-8">
                                    <input type="password" name="password_confirmation" id="password_confirmation" 
                                    class="profile-input form-control ">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto">
                            <input type="submit" class="btn btn-red" value="Submit">
                            <a class="btn btn-form-cancel" href="{{ route('user-profile') }}">Cancel</a>
                        </div>
                    
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection