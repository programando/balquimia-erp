<ul class="sidebar-menu" data-widget="tree">


  <li class=""><a href="/"><i class="fa fa-home">
      </i> <span>Inicio</span></a>
  </li>

  {{--   <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> --}}


  <li class="treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Configuración</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu">
      <li><a href="{{ route( 'prd.undmed.show.form' )}}"><i class="fa fa-circle-o"></i> Unidades de Medida</a></li>
      <li><a href=  "#"><i class="fa fa-circle-o"></i> Otra Opcion Confg.</a></li>
    </ul>

  </li>


     @php $ImprimirUl = FALSE ; @endphp
        @foreach( $Menu  as $Opciones   )
            @if ( $Opciones->parent == 0 )

                @if ( $ImprimirUl )
                    </li>
                  </ul>
                @endif
                 <li class="treeview">
               <a href="#"><i class="fa fa-link"></i>
                <span> {{ $Opciones->name }} </span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                   </span>
                 </a>
                 <ul class="treeview-menu">
                  @else
                    <li><a href=  "#"><i class="fa fa-circle-o"></i> {{ $Opciones->name }}</a></li>
                    @php $ImprimirUl = TRUE ; @endphp
            @endif
        @endforeach


