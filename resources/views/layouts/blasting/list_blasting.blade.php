@extends('layouts.app')
@section('content')
<div class="d-sm-flex justify-content-between align-items-center">
    <h3 class="text-dark mb-4">Email Blasting</h3>
    <button class="btn btn-primary btn-sm d-none d-sm-inline-block btnMove mb-3" data-toggle="modal" data-target="#newCampaignModal" style="background: rgb(230,32,43);border-color: rgb(230,32,43); margin-bottom:0px;"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;Blast Email</button>
</div>
<div class="card shadow">
    <div class="tabbable">
        <div class="tab-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>Name of Campaign</th>
                                <th>Subject of Campaign</th>
                                <th>Total Recipient(s)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{$campaign->campaign_name}}</td>
                                <td align="center">{{$campaign->subject}}</td>
                                <td align="center">{{$campaign->total_participant}}</td>
                                <td align="center">
                                    <button type="button" style="padding: 1px 12px;" class="btnAction btn btn-info" ><i class="fa fa-info"></i></button>
                                    <a href="" data-toggle="modal" data-target="#delFeedbackModal"><button type="button" style="padding: 1px 12px;" class="btnAction btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>Announcement for ITS</td>
                                <td align="center">International Talks' Meeting Invitation</td>
                                <td align="center">21</td>
                                <td align="center">
                                    <button type="button" style="padding: 1px 12px;" class="btnAction btn btn-info" ><i class="fa fa-info"></i></button>
                                    <a href="" data-toggle="modal" data-target="#delFeedbackModal"><button type="button" style="padding: 1px 12px;" class="btnAction btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
                                </td>
                            </tr> -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newCampaignModal" tabindex="-1" role="dialog" aria-labelledby="newCampaignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="newCampaignModalLabel">Make a new Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-name-campaign">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name-new-campaign">Write a campaign's title</label>
                        <input type="text" id="campaign_title" name="campaign_title" class="form-control bg-gray-200" placeholder="Write your title here" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Make</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $(function() {
        $('#form-name-campaign').on('submit', function(event) {
            event.preventDefault();
            var name = $('#campaign_title').val();

            $.ajax({
                type: 'POST',
                data: {
                    name: name
                },
                url: "{{ route('addBlasting')}}",
                success: function(response) {
                    console.log(name)
                    window.location.href = "{{url('manageBlast')}}"; 
                }
            });
        })
    })
</script>
@endsection