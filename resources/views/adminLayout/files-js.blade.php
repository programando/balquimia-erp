<!-- jQuery 3 -->
<script src="{{asset('admin-js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin-js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-js/adminlte.min.js')}}"></script>
<script src="{{asset('plugins/icheck/icheck.js')}}"></script>

<script src="{{asset('js/Vue-App.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
    $(document).ready(function(){
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square',
        increaseArea: '20%' // optional
        });
    });
</script>
