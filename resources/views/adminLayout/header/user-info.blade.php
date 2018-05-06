<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <img src={{ FolderImagesUsers().'/avatar.png' }} class="user-image" alt="User Image">
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs">{{ User()->nom_usua }}</span>
  </a>
  <ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
      <img src={{ FolderImagesUsers().'/avatar.png'  }} class="img-circle" alt="User Image">

      <p>
        {{ User()->nom_usua }}
        <small>  Registrado desde : {{ User()->created_at->format('d/M/y') }}</small>
      </p>
    </li>
    <!-- Menu Body -->

    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-success btn-flat">Configurar Perfil</a>
      </div>
      <div class="pull-right">
        <a href=  "{{ route( 'cerrar-sistema' )}}" class="btn btn-success btn-flat">Cerrr sesión</a>
      </div>
    </li>
  </ul>
</li>
