@extends('client.layout.main')
@section('title', 'Academic')
@section('content')
<!---
Insert Here
--->
<section id="academicHeader">
    <div class="d-flex justify-content-center align-items-center academic-heading">
        <div class="container-fluid academic-container">
            <h1 class="d-block mb-3">Get academic support</h1>
            <h4 class="d-block mb-3">Top of the line support for your academic needs. Access and contribute to our community-sourced academic resources here</h4>
            <div class="row mt-3">
                <div class="col-6 mb-3">
                    Join us on Discord
                    <div class="spacer mb-2"></div>
                    <button class="btn discord-btn">
                        <a href="#"><img class="discord-img" src="{{asset('projectad/assets/img/discord.png')}}" alt=""></a>
                    </button>
                </div>
                <div class="col-6 mb-3">
                    Access our E-Library
                    <div class="spacer mb-2"></div>
                    <button class="btn drive-btn">
                        <a href="{{url('user-elibrary')}}"><i class="fab fa-google-drive"></i>  E-Library</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection