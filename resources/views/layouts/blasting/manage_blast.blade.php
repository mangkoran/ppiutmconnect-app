@extends('layouts.app')
@section('content')
<div class="d-sm-flex justify-content-between align-items-center">
    <h3 class="text-dark mb-4">Manage Your Content Here!!</h3>
</div>
<div class="card shadow">
    <div class="tabbable">
        <div class="tab-content">
            <div class="card-header py-3">
            @if(session()->has('campaign_title'))
                <p class="text-primary m-0 font-weight-bold">{{session()->get('campaign_title')}}</p>
            @else
                <p class="text-primary m-0 font-weight-bold">Raenek isine</p>
            @endif
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            @if(session()->has('total_receiver'))
                            <i class="fa fa-check-circle-o" style="color:green"></i>
                            <big class="text-dark">Recipients</big><br>
                            <small>{{session()->get('total_receiver')}} recipients</small>
                            @else
                            <i class="fa fa-check-circle-o"></i>
                            <big class="text-dark">Recipients</big><br>
                            <small>0 recipients</small>
                            @endif
                        </div>
                        <div class="col-sm-6 text-right">
                            <button onclick="window.location.href='{{url('chooseRecipients')}}'" class="btn btn-primary col-sm-4">Choose Recipients</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            @if(session()->has('subject'))
                            <i class="fa fa-check-circle-o" style="color:green;"></i>
                            <big class="text-dark">Campaign's Subject</big><br>
                            <small id="subject-text">{{session()->get('subject')}}</small>
                            @else
                            <i class="fa fa-check-circle-o"></i>
                            <big class="text-dark">Campaign's Subject</big><br>
                            <small id="subject-text">Subject campaign goes here....</small>
                            @endif
                        </div>
                        <div class="col-sm-6 text-right">
                            <button data-toggle="modal" data-target="#subjectModal"  class="btn btn-primary col-sm-4">Change Subject</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            @if(session()->has('design_email'))
                            <i class="fa fa-check-circle-o" style="color:green;"></i>
                            <big class="text-dark">Content</big><br>
                            <small>Email designed </small>
                            @else
                            <i class="fa fa-check-circle-o"></i>
                            <big class="text-dark">Content</big><br>
                            <small>Design your email's content</small>
                            @endif
                        </div>
                        <div class="col-sm-6 text-right">
                            <button onclick="window.location.href='{{url('makeTemplate')}}'" class="btn btn-primary col-sm-4">Design Email</button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            @if(session()->has('senderemail'))
                            <i class="fa fa-check-circle-o" style="color:green;"></i>
                            <big class="text-dark">Sender</big><br>
                            <small>{{session()->get('host')}}:{{session()->get('port')}} {{session()->get('senderemail')}} </small>
                            @else
                            <i class="fa fa-check-circle-o"></i>
                            <big class="text-dark">Sender</big><br>
                            <small>Sender's email configuration</small>
                            @endif
                        </div>
                        <div class="col-sm-6 text-right">
                            <button data-toggle="modal" data-target="#senderModal" class="btn btn-primary col-sm-4">Configure sender</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <button type="button" class="btn btn-danger btn-shadow" onclick="window.location.href='{{url('listBlasting')}}'">Cancel</button>
                    <button type="submit" id="send-new-campaign" class="btn btn-success btn-shadow">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal for subject -->
<div class="modal fade" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="subjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="newCampaignModalLabel">Campaign's Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-subject-campaign">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject-new-campaign">Write a subject</label>
                        <input type="text" id="subject-new-campaign" class="form-control bg-gray-200" placeholder="Write your subject here" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" onclick="">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal for sender configuration -->
<div class="modal fade" id="senderModal" tabindex="-1" role="dialog" aria-labelledby="senderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="newCampaignModalLabel">Campaign's Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-campaign-sender">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name-new-campaign">Mail Server</label>
                        <input type="text" id="host" class="form-control bg-gray-200" placeholder="smtp.gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="name-new-campaign">Email</label>
                        <input type="text" id="email" class="form-control bg-gray-200" placeholder="abc@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="name-new-campaign">Email's Password</label>
                        <input type="password" id="password" class="form-control bg-gray-200" placeholder="Password Email" required>
                    </div>
                    <div class="form-group">
                        <label for="name-new-campaign">Port Server</label>
                        <input type="text" id="port" class="form-control bg-gray-200" placeholder="587" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" onclick="">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<iframe srcdoc="{{session()->get('design_email')}}" frameborder="0"></iframe>

@endsection

@section('js')
<script>
$('#form-subject-campaign').on('submit', function(e){
    e.preventDefault();
    var subject= $('#subject-new-campaign').val();
    console.log(subject)

    $.ajax({
        type: 'POST',
        data: {
            subject: subject
        },
        url: "{{ route('addBlasting')}}",
        success: function(response) {
            window.location.href = "{{url('manageBlast')}}"
        }
    })

});
$('#form-campaign-sender').on('submit', function(event) {
            event.preventDefault();
            var host = $('#host').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var port = $('#port').val();

            $.ajax({
                type: 'POST',
                data: {
                    host: host,
					email : email,
					password : password,
					port : port
                },
                url: "{{ route('addBlasting')}}",
                success: function(response) {
                    window.location.href = "{{url('manageBlast')}}"
                }
            })
        });

        $('#send-new-campaign').click(function() {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('sendBlasting')}}",
                success: function(response) {
                    window.location.href = "{{url('listBlasting')}}";
                    alert("Campaign sent successfully!");
                }
            })

        });

</script>
@endsection
