 <div>
    <ul class="sidebar-menu" data-widget="tree" >
      <li >
       <router-link :to="{name : 'inicio'}"><i class="fa fa-home"></i> <span>Inicio</span> </router-link>
     </li>

     <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Configuración</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><router-link :to="{name : 'cargos'}" ><i class="fa fa-home"></i> <span>Cargos</span> </router-link></li>
        <li><router-link :to="{name : 'lineas'}" ><i class="fa fa-home"></i> <span>Líneas</span> </router-link></li>
        <li><router-link :to="{name : 'und-medidas'}" ><i class="fa fa-home"></i> <span>Unidades de Medida</span> </router-link></li>
      </ul>
    </li>

  </ul>
</div>


   {{--  <li class="active">
    <a href="/"><i class="fa fa-home">
      </i> <span>Inicio</span></a>
  </li>



     @php
      $ImprimirUl = FALSE ;

     @endphp
        @foreach( $Menu  as $Opciones   )
            @if ( $Opciones->parent == 0 )
                @if ( $ImprimirUl )
                    </li>
                  </ul>
                @endif
                <li    class="treeview">
                   <a href="#"><i class="{{ $Opciones->image }}" ></i>
                    <span> {{ $Opciones->name }}.. </span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                       </span>
                     </a>
                 <ul class="treeview-menu">
                  @else
                    <li>
                      <a href="{{ route( "$Opciones->slug" ) }}" >
                        <i class="{{ $Opciones->image }}"></i>
                          {{ $Opciones->name }}
                        </a>
                    </li>
                    @php $ImprimirUl = TRUE ; @endphp
            @endif
        @endforeach

   --}}


