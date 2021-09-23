@extends('layouts.app')
@section('content')
<div class="d-sm-flex justify-content-between align-items-center">
    <h3 class="text-dark mb-4">Choose Recipients</h3>
    <div class="float-right">
        <button class="btn btn-primary btn-sm d-none d-sm-inline-block btnMove mb-3" style="background: rgb(230,32,43);border-color: rgb(230,32,43); margin-bottom:0px;">Reset</button>
        <button class="btn btn-default btn-sm d-none d-sm-inline-block btnMove mb-3" data-toggle="modal" data-target="#filterCampaignModal" style="border-color: rgb(230,32,43); margin-bottom:0px; color:black;"> <i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
        <button class="btn btn-primary btn-sm d-none d-sm-inline-block btnMove mb-3" data-toggle="modal" data-target="#confirmModal" style="background: rgb(230,32,43);border-color: rgb(230,32,43); margin-bottom:0px;">Select Contact</button>
    </div>
</div>
<div class="card shadow">
    <div class="tabbable">
        <div class="tab-content">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">List of Recipients</p>
                <span id="count_checked" class="mb-2"><b>0</b> contact(s) selected</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th><input type="checkbox" name="" class="checkAll" id="checkAllContact"></th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Degree</th>
                                <th>Batch</th>
                                <th>Status in ISS</th>
                                <th>Major</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr align="center">
                                <th><input type="checkbox" class="checkSingle" name="" id="{{$contact->email}}"></th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->degree}}</td>
                                <td>{{$contact->batch}}</td>
                                <td>{{$contact->grant_desc}}</td>
                                <td>{{$contact->program_code}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal for confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure to proceed to the next step?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Okay" below if you are ready to proceed to the next step.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="okay" href="#">Okay</a>
            </div>
        </div>
    </div>
</div>

<!-- modal for filter -->
<div class="modal fade" id="filterCampaignModal" tabindex="-1" role="dialog" aria-labelledby="filterCampaignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-body" id="filterCampaignModalLabel">Filter Recipients</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">

                <div class="modal-body">

                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-12 text-body">
                                    Faculty
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >Engineering</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >Social Science</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >AHIBS</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >Education</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >MJIIT</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >Archi and Design</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-12 text-body">
                                    Degree
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label"> UG</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" >PG</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input">
                                        <label class="custom-control-label" > Phd </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-12 text-body">
                                    Gender
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input" name="male">
                                        <label class="custom-control-label">Male</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="saring custom-control-input" name="female">
                                        <label class="custom-control-label" >Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6 text-body">
                                    Batch
                                </div>
                                <div class="col-sm-6 form-group">
                                    <div class="dropdown">
                                        <select name="province" id="check-filter-crm-negara" class="form-control bg-gray-200">
                                            <option value="">All Batch</option>
                                            <option value="">2018/2019-2</option>
                                            <option value="">2019/2018-1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" align="center">
                            <div class="row">
                                <div class="text-body col-sm-12">
                                    ISS Status
                                </div>
                                <div class="form-group col-sm-12" align="center">
                                    <div class="dropdown">
                                        <select name="industry" id="check-filter-crm-kota" class="form-control bg-gray-200">
                                            <option value="">President</option>
                                            <option value="">Division 1</option>
                                            <option value="">Division 2</option>
                                            <option value="">Division 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="apply" class="btn btn-success">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

<!-- @if(session()->has('id_contact'))
    @php
        $ids=session()->get('id_contact');
    @endphp
@else
    @php
        $ids=array();
    @endphp
@endif -->
<script>
$("#checkAllContact").click(function() {
            $(".checkSingle").prop('checked', $(this).prop('checked'));

        });
        $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#checkAllContact").prop("checked", false);
            }
        });
       //text
       var single = $(".checkSingle");
        var all = $(".checkAll"); 
        single.change(function(){
            $("#count_checked").html("<b>" + single.filter(":checked").length + "</b> contact(s) selected");
            if (single.length == single.filter(":checked").length){
                all.prop("checked", true);
            }
        });
        all.change(function(){
            $("#count_checked").html("<b>" + single.filter(":checked").length + "</b> contact(s) selected");
        });

        // var jQueryArray = {{json_encode($ids)}};
        // $.each(jQueryArray, function(key, value){
        //     $("#" + value).prop("checked", true); 
        //     $("#count_checked").html("<b>" + $(".checkSingle:checked").length + "</b> Kontak Terpilih");
        // });

        $("#okay").on('click', function(e){
            var contact = [];
            var total = $('.checkSingle:checked');
            $.each(total, function() {
            contact.push($(this).attr('id'));
            });

            if (total.length == 0) {
                alert("You ain't chosen nothing");
            } else {
                $.ajax({
                    type: 'POST',
                    data: {
                        total_receiver: total.length,
                        id_contact: contact
                    },
                    url: "{{ route('addBlasting')}}",
                    success: function(response) {
                        window.location.href = "{{url('manageBlast')}}";
                    }
                });
            };

        });
</script>
@endsection