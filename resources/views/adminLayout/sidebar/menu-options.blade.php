<div id="VueMenuApp">


<ul class="sidebar-menu" data-widget="tree" >

  <li class="active"><a href="/"><i class="fa fa-home">
      </i> <span>Inicio</span></a>
  </li>

    <li class="treeview">
      <a href=  "{{ route( 'menu.load' )}}"><i class="fa fa-home">
      </i> <span>Reiniciar Menu</span></a>
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

</div>
