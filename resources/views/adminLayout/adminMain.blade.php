<!DOCTYPE html>
<html>

  <head>
       @include('adminLayout.metas')
       @include('adminLayout.files-css')
  </head>

<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">

        @include('adminLayout.header.main-header')        <!-- Main Header -->
        @include('adminLayout.sidebar.main-sidebar')      <!-- Left side column. contains the logo and sidebar -->

        <div class="content-wrapper">                     <!-- Content Wrapper. Contains page content -->
             {{--  @include('adminLayout.migas')  --}}      <!--            Content Header (Page header) -->

            <section class="content container-fluid">     <!-- Main content --> <!---  Your Page Content Here | -->

                <div id="VueApp">

                    @yield('contenido')

                </div>

            </section>

        </div><!-- /.content --><!-- /.content-wrapper -->

        @include('adminLayout.sidebarRigth.main-sidebar')

      <!-- /.control-sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>


   </div>
    <!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->
    @include('adminLayout.files-js')

</body>
</html>


