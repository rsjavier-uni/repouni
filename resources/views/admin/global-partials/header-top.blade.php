<header class="header dark-bg">
     <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Menu Navegación" data-placement="bottom"><i class="icon_menu"></i></div>
     </div>
    <a href="{{route('admin')}}" class="logo">Repo <span class="lite">UNI</span></a>
    <div class="nav search-row" id="top_menu">
       <ul class="nav top-menu">                    
          <li>
              <form class="navbar-form">
                 <input class="form-control" placeholder="Buscar" type="text">
              </form>
           </li>                    
        </ul>               
     </div>
     <div class="top-nav notification-row">                
        <ul class="nav pull-right top-menu">
           <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                    {!! HTML::image(asset('assets/images/avatar_2x.png'),'img',['alt'=>''])!!}
                </span>
                <span class="username">{{$current_usuario->username}}</span>
                   <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                 <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                       <a href="{{ route('usuario.edit',$current_usuario->id)}}"><i class="icon_profile"></i> Perfil</a>
                    </li>
                    <li>
                       <a class ="{{$current_usuario->can('role.index')?'enabled':'disabled'}}" href="{{ url('role/index') }}"> <i class="fa fa-address-card-o"></i>Roles de Usuarios</a>
                    </li>
                    <li>
                       <a class ="{{$current_usuario->can('permission.manager')?'enabled':'disabled'}}" href="{{ url('permission/manager') }}"> <i class="icon_key_alt"></i>Permisos de Usuarios</a>
                    </li>
					<li>
                       <a class ="{{$current_usuario->can('ajustes.update')?'enabled':'disabled'}}" href="{{ url('ajustes') }}"><i class="fa fa-cog"></i> Ajustes</a>
                    </li>
                    <li>
                       <a href="{{ url('auth/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesion</a>
                    </li>
                 </ul>
                   </li>
        </ul>
     </div>
</header>