@extends('layouts.app')

@section('content')

    <h3 class="text-dark mb-4">Posting Management</h3> <br>
    <div class="d-sm-flex justify-content-between align-items-center mb-12">
        <div class="mb-9">
            <ul class="nav nav-tabs">
                <li><button id="dash-1" class="btn active" onclick="allContent();" href="#dashboard-1"
                        data-toggle="tab">All</a></li>
                <li><button id="dash-2" class="btn " onclick="newsContent();" href="#dashboard-2" data-toggle="tab">News</a>
                </li>
                <li><button id="dash-3" class="btn" onclick="opregContent();" href="#dashboard-3" data-toggle="tab">Event
                        Registration</a></li>
            </ul>
        </div>
        <a class="btn btn-primary btn-sm d-none d-sm-inline-block btnMove mb-3" href="#" data-toggle="modal"
            data-target="#addPostModal"
            style="background: rgb(230,32,43);border-color: rgb(230,32,43); margin-bottom:0px;"><i
                class="fa fa-plus fa-sm text-white-50"></i>&nbsp;Add Post</a>
    </div>
    <div class="card shadow">
        <div class="tabbable">
            <div class="tab-content">
                <div class="tab-pane active" id="dashboard-1">
                    <div class="dashboard-1">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">List</p>
                        </div>
                        @include('layouts.post.content_list')
                    </div>
                </div>
                <div class="tab-pane" id="dashboard-2">
                    <div class="dashboard-2">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">List of Open Registration</p>
                        </div>
                        @include('layouts.post.content_list')
                    </div>
                </div>
                <div class="tab-pane" id="dashboard-3">
                    <div class="dashboard-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">List of Open Registration</p>
                        </div>
                        @include('layouts.post.content_list')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPost" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPost">What do you want to add?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Please choose your preference:</div>
                <div class="modal-footer">
                    <a class="btn btn-info" href="{{ url('addNews') }}">News</a>
                    <a class="btn btn-primary" href="{{ url('addPost') }}">Event</a>
                </div>
            </div>
        </div>
    </div>
@endsection
