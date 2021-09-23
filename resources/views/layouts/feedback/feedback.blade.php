@extends('layouts.app')
@section('content')
<h3 class="text-dark mb-4">Feedback Management</h3> <br>
<div class="card shadow">
  <div class="tabbable">
    <div class="tab-content">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr align="center">
                <th>Title</th>
                <th>Posted on</th>
                <th>Closed Registration</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($finishedEvents as $event)
              <tr>
                <td>{{ $event->event_title }}</td>
                <td align="center">{{ $event->posted_on }}</td>
                <td align="center">{{ $event->closed_on }}</td>
                <td align="center">
                  <a href="{{ route('feedbackDetails', $event->event_id) }}"><button type="button" style="padding: 1px 12px;" class="btnAction btn btn-info" ><i class="fa fa-eye"></button></i></a>
                  <a href="" data-toggle="modal" data-target="#delFeedbackModal"><button type="button" style="padding: 1px 12px;" class="btnAction btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
