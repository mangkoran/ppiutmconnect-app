@extends('layouts.app')

@section('content')
<div class="d-sm-flex justify-content-between align-items-center">
    <h3 class="text-dark mb-4">Academic Library Management</h3>
</div>
<div class="card shadow">
    <div class="tabbable">
        <div class="tab-content">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Academic Library Drive</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 p-0">
                        <iframe style="height: 600px;" width="100%" id="driveFrame" class="drive-frame" src="https://googledriveembedder.collegefam.com/?key=AIzaSyC700jjLfhMguHM8nh2fDqlMZaF4p5Io34&folderid=1M57z6VLetWJ5p_fI2Kjvq33K70i5YBQs" ></iframe>
                            <!-- <iframe src="https://drive.google.com/embeddedfolderview?id=1336nB37C05I1Y4XrOT2SGc-yUpbGJ-KJ#grid" style="width:100%; height:600px; border:0;"></iframe> -->
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{url('uploadLib')}}" method="post" enctype="multipart/form-data">
                
                <div class="d-sm-flex justify-content-between align-items-center">
                    @csrf
                    <div class="text-left col-2">
                        <select name="folder" id="folder" class="btn-danger btn">
                            <option value="">Root Folder</option>
                            <option value="13p_6ip7ur2QDfp73LapXTwRAOWTPq0tw">Testing Folder</option>
                        </select>
                        <input class="mt-2" type="file" name="thing[]" multiple>
                    </div>
                    <div class="text-left col-10">
                        <input type="submit" class="btn btn-success btn-shadow" value="upload">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection