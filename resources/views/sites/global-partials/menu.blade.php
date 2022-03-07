<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to_route('sites',$ajustes->titulo_sitio,array(),array('class' => 'navbar-brand')) !!}
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li> {!! link_to_route('sites','Inicio') !!}</li>
                <li>{!! link_to_route('sites.aboutUs','Acerca de') !!}</li>
                <li>{!! link_to_route('sites.datos-abiertos','Datos Abiertos') !!}</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Areas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       	@foreach($areas as $area)
                       	   <li> {!! link_to_route('sites.area',$area->area,[$area->id]) !!}</li>
                       	@endforeach
                    </ul>
                </li>
                <li>{!! link_to_route('sites.contacto','Contactenos') !!}</li> 
                <li>{!! link_to_route('registration.new',' Registrarse',array(),array('class' => 'glyphicon glyphicon-edit')) !!}</li> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-log-in" data-toggle="dropdown"> Acceder <span class="caret"></span></a>
		            <ul id="login-dp" class="dropdown-menu">
			            <li>@include('sites.other-pages.login-form') </li>
                    </ul>
                </li>
                @if (Auth::guard('webregister')->check())
                    <li class="dropdown">
                        <a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                        <ul class="dropdown-menu">
				            <li><a href="{{route('webSiteUser.edit')}}"><i class="glyphicon glyphicon-edit"></i> Perfil</a></li>
				            <li><a href="{{ url('sites/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
                         </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
