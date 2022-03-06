<aside>
    <div id="sidebar"  class="nav-collapse ">
       <ul class="sidebar-menu">                
          <li class="active">
             <a class="" href="{{ url('admin') }}">
               <i class="glyphicon glyphicon-dashboard"></i>
               <span>Dashboard</span>
             </a>
         </li>
         <li class="sub-menu">
            <a href="javascript:;" class="">
               <i class="glyphicon glyphicon-user"></i>
                  <span>Autor</span>
                  <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
                 <li>{!! link_to_route('autor.new','Nuevo Autor',array(),array('class'=>$current_usuario->can('autor.new')?'enabled':'disabled')) !!}</li>               
                 <li>{!! link_to_route('autor.index','Lista de Autores',array(),array('class'=>$current_usuario->can('autor.index')?'enabled':'disabled')) !!}</li>
            </ul>
         </li>    
         <li class="sub-menu">
           <a href="javascript:;" class="">
              <i class="glyphicon glyphicon-list"></i>
                <span>Area</span>
                <span class="menu-arrow arrow_carrot-right"></span>
           </a>
           <ul class="sub">
              <li>{!! link_to_route('area.new','Nueva Area',array(),array('class'=>$current_usuario->can('area.new')?'enabled':'disabled')) !!}</li>                          
              <li>{!! link_to_route('area.index','Lista de Areas',array(),array('class'=>$current_usuario->can('area.index')?'enabled':'disabled')) !!}</li>
           </ul>
         </li>    
         <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="glyphicon glyphicon-book"></i>
                <span>Investigación</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
               <li>{!! link_to_route('libroinv.new','Nueva Investigación',array(),array('class'=>$current_usuario->can('libroinv.new')?'enabled':'disabled')) !!}</li>
               <li>{!! link_to_route('libroinv.index','Investigaciones',array(),array('class'=>$current_usuario->can('libroinv.index')?'enabled':'disabled')) !!}</li>
            </ul>
         </li>     
         <li class="sub-menu">
	       <a href="javascript:;" class="">
	         <i class="icon_profile"></i>
	            <span>Usuario</span>
	            <span class="menu-arrow arrow_carrot-right"></span>
	       </a>
	       <ul class="sub">                          
	          <li>{!! link_to_route('usuario.new','Nuevo Usuario',array(),array('class'=>$current_usuario->can('usuario.new')?'enabled':'disabled')) !!}</li>
	          <li>{!! link_to_route('usuario.index','Lista de Usuarios',array(),array('class'=>$current_usuario->can('usuario.index')?'enabled':'disabled')) !!}</li> 
	       </ul>
        </li>        
      </ul>
   </div>
 </aside>