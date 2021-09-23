<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
{{-- <script src="assets/js/chart.min.js"></script> --}}
<script src="{{asset('js/chart.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>

{{-- <script src="assets/js/script.min.js"></script> --}}
<script src="{{asset('js/script.min.js')}}"></script>


<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{asset('js/datatables-demo.js')}}"></script>
<script>
        $('#dash-2').click(function(){
            $('#dash-2').addClass('active');
            $('#dash-1').removeClass('active');
            $('#dash-3').removeClass('active');
            load_followers();
        });
        $('#dash-3').click(function(){
            $('#dash-3').addClass('active');
            $('#dash-2').removeClass('active');
            $('#dash-1').removeClass('active');
            load_followers();
        });
        $('#dash-1').click(function(){
            $('#dash-1').addClass('active');
            $('#dash-2').removeClass('active');
            $('#dash-3').removeClass('active');
            load_followers();
        });
</script>