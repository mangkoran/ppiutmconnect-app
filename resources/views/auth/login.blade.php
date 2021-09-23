<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UTM - Connect | Log in</title>
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

<body class="bg-gradient-white"  style="background: url('{{url('images/output-onlinepngtools.png')}}') center / contain no-repeat, rgb(255,255,255);">
    <div class="container">

        <div class="row justify-content-center swing animated">
             <div class="col-md-9 col-lg-12 col-xl-10" style="opacity: 0.95;"><br><br>
                 <div class="card shadow-lg o-hidden border-0 my-5">
                     <div class="card-body p-0">
                         <div class="row">
                             <div class="col-lg-6 d-none d-lg-flex">
                                 <div class="flex-grow-1 bg-login-image"
                                     style="background: url('{{url('images/dogs/logo-ppi-utm.png')}}') center / contain no-repeat;">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="p-5">
                                     <div class="text-center">
                                         <h4 class="text-dark mb-4"> <strong>Welcome to PPI UTM-Connect</strong></h4>
                                     @if (session()->has('msg'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                     @endif
                                     </div>
                                     <form class="user" method="POST" action="{{ route('check_user') }}">
                                         @csrf
                                         <div class="form-group"><input
                                                 class="form-control form-control-user @error('email') is-invalid @enderror"
                                                 type="email" value="{{ old('email') }}" id="exampleInputEmail"
                                                 aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                 name="email">
                                             @error('email')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                         </div>
                                         <div class="form-group"><input
                                                 class="form-control form-control-user @error('password') is-invalid @enderror"
                                                 type="password" id="exampleInputPassword" placeholder="Password"
                                                 name="password">
                                             @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                         </div>
                                         <button class="btn btn-primary btn-block text-white btn-user" type="submit"
                                             data-toggle="modal" data-target="#myModal"
                                             style="background: rgb(230,32,43);">Log in</button>
                                         <hr>
                                     </form>
                                     <div class="form-group row">
                                         <div class="col-md-6 offset-md-4">
                                             <div class="form-check">
                                                 <input class="form-check-input" type="checkbox" name="remember"
                                                     id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                 <label class="form-check-label" for="remember">
                                                     {{ __('Remember Me') }}
                                                 </label>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="text-center">
                                         @if (Route::has('password.request'))
                                             <a class="btn btn-link" href="{{ route('password.request') }}">
                                                 {{ __('Forgot Your Password?') }}
                                             </a>
                                         @endif
                                     </div>
                                     <div class="text-center"><a class="small" href="{{route('register')}}">Create an Account!</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><Strong>Result</Strong></h4>
                    <button onclick="login();" type="button" class="close" data-dismiss="modal">&times;</button>
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
                        <center class="success-login">Log in Success!!</center>
                    </div>
                    <div class="modal-footer">
                    <button type="button" onclick="login();" class="btn btn-success" data-dismiss="modal">Ok</button>
                    </div>
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

