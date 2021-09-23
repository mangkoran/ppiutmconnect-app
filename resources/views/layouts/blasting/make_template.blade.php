@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<!-- <div class="container"> -->
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Menu Utama > Campaign List > New Campaign > <b>Content</b></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary shadow padding-btn" style="background: rgb(230,32,43);" id="back-new-campaign" onclick="window.location.href ={{url('manageBlast')}}">
                <!-- <img src="assets/img/back.svg" width="12" height="12"> -->
                < Back
            </button>
        </div>
    </div><br>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-8 mb-4 mb-md-0 template-scrolling">
            <div class="card-body shadow design-email">
                <div class="row">
                    <div class="col">
                        <p style="color: #192A3E; letter-spacing: 0.01em; font-size: 15px;">Title of Campaign goes here</p>
                        <p class="d-flex justify-content-center"><img id="logo-template" onclick="changeLogo()" style="cursor:pointer; height: 80px; width:auto;" class="d-flex justify-content-center" src="{{asset('images/template_placeholder_logo.png')}}" alt="logo"></p>
                        <p id="title-template" onclick="changeTitle()" style="cursor:pointer; letter-spacing: 0.01em; text-align: center; line-height: 47px; font-size: 30px; font-weight: bold; color: black; margin-top:45px;">Share your stories</p>
                        <p id="subtitle-template" onclick="changeSubtitle()" style="cursor:pointer; letter-spacing: 0.01em; text-align: center; line-height: 47px; font-size: 23px; color: black; margin-top:12px;">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <p class="d-flex justify-content-center"><img id="img-template-1" onclick="changeImg(1)" class="d-flex justify-content-center img-fluid" style="cursor:pointer; margin-top:10px;" src="{{asset('images/template_placeholder_img_long.png')}}" alt="img_header"></p>
                        <div class="d-flex" style="margin-left: 24px; ">
                            <div style="float: left; width: 50%;">
                                <p id="heading-template-1" onclick="changeHeading(1)" style="cursor:pointer; color: black;">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                <p id="isi-template-1" onclick="changeContent(1)" style="cursor:pointer;">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, </p>
                            </div>
                            <div style="float: right; width: 50%;">
                                <p id="heading-template-2" onclick="changeHeading(2)" style="cursor:pointer; color: black;">Lorem ipsum dolor sit amet, consectetur adipiscing elit<p>
                                        <p id="isi-template-2" onclick="changeContent(2)" style="cursor:pointer;">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, </p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="shadow">
                <div class="card-body change-content">
                    Click on the items you want to change
                </div>
            </div>
            <button class="btn btn-main btn-success" style="margin-top:25px;" onclick="save_template()" id="save-template">Save & Close</button>
        </div>
    </div>
    <br><br>

@endsection
<!-- </div> -->
@section('js')
<script src="assets/js/function_template.js"></script>
<script>
//start function for template matter
function changeLogo() {
    $(".change-content").html('<input type="file" class="btn btn-second" name="img-btn" id="img-btn" onchange="loadLogo(event),tempImg(0)"></input>')
}

function loadLogo(event) {
    var logo = document.getElementById('logo-template');
    logo.src = URL.createObjectURL(event.target.files[0]);
}

function changeImg(id) {
    $(".change-content").html('<input type="file" class="btn btn-second" name="img-btn" id="img-btn" onchange="loadImg(event,' + id + '),tempImg('+ id +')"></input>')
}

function loadImg(event, id) {
    var logo = document.getElementById('img-template-' + id);
    logo.src = URL.createObjectURL(event.target.files[0]);
}

function tempImg(idImg){
    var imgPath = document.getElementById('img-btn').value;
    
    if(imgPath != ""){
        var formData = new FormData();
        formData.append('img_file', $('input[type=file]')[0].files[0])
        formData.append('id_img', idImg)

        $.ajax({
            type: 'POST',
            url: '/tempImg',
            data: formData,
            cache: false,
            contentType:false,  
            processData:false, 
            success: function(response){    
                console.log(response)
            },
            dataType:"json"
        });
    }
}

function changeTitle() {
    var title = $("#title-template").html()
    $(".change-content").html('<textarea rows="3" type="text" class="form-control" id="title" onkeyup="keyupTitle()">' + title + '</textarea>')
}

function keyupTitle() {
    var title = $("#title").val()
    $("#title-template").html(title)
}

function changeSubtitle() {
    var subtitle = $("#subtitle-template").html()
    $(".change-content").html('<textarea rows="3" type="text" class="form-control" id="subtitle" onkeyup="keyupSubtitle()">' + subtitle + '</textarea>')
}

function keyupSubtitle() {
    var subtitle = $("#subtitle").val()
    $("#subtitle-template").html(subtitle)
}

function changeHeading(id) {
    var heading = $("#heading-template-"+id).html()
    $(".change-content").html('<textarea rows="3" type="text" class="form-control" id="heading" onkeyup="keyupHeading('+id+')">' + heading + '</textarea>')
}

function keyupHeading(id) {
    var heading = $("#heading").val()
    $("#heading-template-"+id).html(heading)
}

function changeContent(id) {
    var content = $("#isi-template-"+id).html()
    $(".change-content").html('<textarea rows="3" type="text" class="form-control" id="isi" onkeyup="keyupContent('+id+')">' + content + '</textarea>')
}

function keyupContent(id) {
    var content = $("#isi").val()
    $("#isi-template-"+id).html(content)
}

function save_template() {  
    var title_template = document.getElementById("title-template").innerHTML;
    if($('#heading-template-1').length > 0 ){
        var heading_template_1 = document.getElementById("heading-template-1").innerHTML;
    } else {
        var heading_template_1 = null;
    }
    if($('#heading-template-2').length){
        var heading_template_2 = document.getElementById("heading-template-2").innerHTML;
    } else {
        var heading_template_2 = null;
    }
    if($('#isi-template-1').length){
        var isi_template_1 = document.getElementById("isi-template-1").innerHTML;
    } else {
        var isi_template_1 = null;
    } 
    if($('#isi-template-2').length){
        var isi_template_2 = document.getElementById("isi-template-2").innerHTML;
    } else {
        var isi_template_2 = null;
    } 
    if($('#subtitle-template').length){
        var subtitle_template = document.getElementById("subtitle-template").innerHTML;
    } else {
        var subtitle_template = null;
    }

    $.ajax({
        type: 'POST',
        data: {
            title_template: title_template,
            heading_template_1: heading_template_1,
            heading_template_2: heading_template_2,
            isi_template_1: isi_template_1,
            isi_template_2: isi_template_2,
            subtitle_template: subtitle_template
        },
        url: "{{ route('renderTemplate')}}",
        success: function(response) {
            window.location.href = "{{url('manageBlast')}}"
        }
    })
}
//end of function for template matter
</script>
@endsection
