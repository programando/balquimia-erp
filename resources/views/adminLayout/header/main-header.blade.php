<header class="main-header">

  @include('adminLayout.header.logo')
  <!-- Header Navbar -->

  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less /.messages-menu -->
        @include('adminLayout.header.messages')
        <!-- Notifications Menu -->
        @include('adminLayout.header.notifications')
        <!-- Tasks Menu -->
        @include('adminLayout.header.tareas')
        <!-- User Account Menu -->
        @include('adminLayout.header.user-info')
        <!-- Control Sidebar Toggle Button -->
        @include('adminLayout.header.icon-config')

      </ul>
    </div>
  </nav>

</header>
