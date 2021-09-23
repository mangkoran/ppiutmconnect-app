@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Feedback for {{ $details['event']->event_title }}</h3> <br>
<div class="col-md-12">
  <div class="card shadow">
    <div class="card-header py-3">
      <p class="text-primary m-0 font-weight-bold">List of Feedback</p>
    </div>
    <div class="card-body">
      @foreach ($details['feedback'] as $index => $feedback)
      <form class="shadow mt-1">
        <div class="form-row p-2">
          <div class="col-md-1" align="center">
            <img class="rounded-circle img-profile d-sm-inline-block" width="50" height="50" src="{{url('images/avatars/avatar1.jpeg')}}" alt="">
          </div>
          <div class="col-md-11">
            <p class="text-primary p-0 m-0">{{ $details['users'][$index]->name }}</p>
            <p class="p-0 m-0">{{ $feedback->comment_on }}</p>
            <hr class="m-0">
          </div>
        </div>
        <div class="form-row pl-3 pb-3">
          <div class="col-md-12">{{ $feedback->feedback }}</div>
        </div>
      </form>
      @endforeach
    </div>
  </div>
</div>
@endsection
