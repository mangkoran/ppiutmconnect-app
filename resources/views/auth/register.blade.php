<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>UTM - Connect | Login</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</head>

<body class="bg-gradient-white" style="background: {{ url('images/output-onlinepngtools.png')}} center / contain no-repeat, rgb(255,255,255);">
    <div class="container" style="opacity: 0.94;"><br><br>
        <div class="card shadow-lg o-hidden border-0 my-5" style="border: 2px solid rgb(5,33,248) ;">
            <div class="card-body p-0">
                <div class="row" style="opacity: 1;border-width: 21px;border-color: rgb(29,49,197);">
                    <div class="col-lg-5 d-none d-lg-flex" style="background: rgb(230,32,43);">
                        <div class="flex-grow-1 bg-register-image" style="background: {{url('images/dogs/logo-ppi-utmcleanputih.png')}} center / contain no-repeat, rgb(230,32,43);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5" style="opacity: 1;">
                            <div class="text-center">
                                <h4 class="text-dark mb-4"><strong>Create a PPI UTM-Connect Account!</strong></h4>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input
                                            class="form-control form-control-user @error('firstName') is-invalid @enderror"
                                            value="{{ old('firstName') }}" type="text" id="exampleFirstName"
                                            placeholder="First Name" name="firstName"></div>
                                    <div class="col-sm-6"><input
                                            class="form-control form-control-user @error('lastName') is-invalid @enderror"
                                            value="{{ old('lastName') }}" type="text" id="exampleLastName"
                                            placeholder="Last Name" name="lastName"></div>

                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group"><input
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" type="email" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Email Address" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            type="password" id="examplePasswordInput" placeholder="Password"
                                            name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password"
                                            id="password-confirm" placeholder="Repeat Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                </div><button class="btn btn-primary btn-block text-white btn-user" type="submit"
                                    
                                    style="background: rgb(230,32,43);"> {{ __('Register Account') }}</button>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="{{route('password.request')}}">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="{{route('login')}}">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="registModal" role="dialog">
        <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Result</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span>
                        <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div> 
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                    </div>
                    <center class="success-login">Successfully Registered!!</center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                </div>
            </div>
        
        </div>
    </div>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{asset('js/script.min.js')}}"></script>
</body>

</html>
