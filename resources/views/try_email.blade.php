@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Try Email Blast</h3>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Email Content</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sendEmail')}}" method="POST">
                            @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="fullName"><strong>Full Name</strong></label><input class="form-control" type="text" id="fullName"  name="fullName"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" name="email"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject"><strong>Subject</strong></label><input class="form-control" type="text" id="subject" name="subject">
                                </div>
                                <div class="form-group">
                                    <label for="address"><strong>Content</strong></label><textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" style="background: rgb(230,32,43);border-color: rgb(230,32,43);">Send</button></div>
                                <input type="text" name="route" id="route" value="profile" hidden>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
