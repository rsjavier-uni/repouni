<div id="page-wrapper" >
    <div id="page-inner">          
     <hr />
       <div class="row">
           <div class="col-lg-12 ">
              <div class="alert alert-info">
                <strong>Bienvenido {{$current_usuario->username}} ! </strong> No tienes tareas para hacer hoy.
              </div>
           </div>
       </div>
       <div class="row text-center pad-top">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a class="{{$current_usuario->can('usuario.new')?'enabled':'disabled'}}" href="{{url('usuario/new')}}" ><i class="fa fa-user-plus fa-5x"></i><h4>Registrar Usuario</h4></a>
            </div>     
           </div> 
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                 <a class="{{$current_usuario->can('usuario.index')?'enabled':'disabled'}}" href="{{url('usuario/index')}}" ><i class="fa fa-users fa-5x"></i><h4>Lista de Usuarios</h4></a>
              </div>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a class="{{$current_usuario->can('autor.new')?'enabled':'disabled'}}" href="{{url('autor/new')}}" ><i class="fa fa-user-plus fa-5x"></i><h4>Registrar Autor</h4></a>
            </div>     
           </div> 
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                 <a class="{{$current_usuario->can('autor.index')?'enabled':'disabled'}}" href="{{url('autor/index')}}" ><i class="fa fa-users fa-5x"></i><h4>Lista de Autores</h4></a>
              </div>
           </div>
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a class="{{$current_usuario->can('area.new')?'enabled':'disabled'}}" href="{{url('area/new')}}"><i class="fa fa-tag fa-5x"></i><h4>Registrar Área</h4></a>
           </div>
          </div> 
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
               <div class="div-square">
                 <a class="{{$current_usuario->can('area.new')?'enabled':'disabled'}}" href="{{url('area/index')}}" ><i class="fa fa-tags fa-5x"></i><h4>Lista de Áreas </h4></a>
               </div>  
           </div>
        </div>    
        <div class="row text-center pad-top">
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
               <div class="div-square">
                 <a class="{{$current_usuario->can('libroinv.new')?'enabled':'disabled'}}" href="{{url('investigacion/new')}}" ><i class="fa fa-book fa-5x"></i><h4>Registrar Investigación </h4></a>
               </div>  
           </div> 	
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
              <div class="div-square">
                <a class="{{$current_usuario->can('libroinv.index')?'enabled':'disabled'}}" href="{{url('investigacion/index')}}"><i class="fa fa-th-list fa-5x"></i><h4>Lista de Investigaciones</h4></a>
              </div>      
             </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a class="{{$current_usuario->can('programa.new')?'enabled':'disabled'}}" href="{{url('programa/new')}}"><i class="fa fa-tag fa-5x"></i><h4>Registrar Programa</h4></a>
           </div>
          </div> 
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a class="{{$current_usuario->can('programa.index')?'enabled':'disabled'}}" href="{{url('programa/index')}}"><i class="fa fa-tags fa-5x"></i><h4>Lista de Programas</h4></a>
           </div>
          </div> 
       </div>
        <div class="row text-center pad-top">
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a class="{{$current_usuario->can('ajustes.ajustes')?'enabled':'disabled'}}" href="{{url('ajustes')}}" > <i class="fa fa-gear fa-5x"></i><h4>Ajustes</h4></a>
            </div>
         </div>
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
             <div class="div-square">
               <a class="{{$current_usuario->can('role.new')?'enabled':'disabled'}}" href="{{url('role/new')}}" ><i class="fa fa-id-card fa-5x"></i><h4>Roles de Usuarios</h4></a>
             </div>
          </div>
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
              <a href="{{url('permission/manager')}}" ><i class="fa fa-lock fa-5x {{$current_usuario->can('permission.manager')?'enabled':'disabled'}}"></i><h4>Permisos de Usuarios</h4></a>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
              <a href="{{url('logs_audits')}}"><i class="fa fa-circle-o-notch fa-5x {{$current_usuario->can('logs.audits')?'enabled':'disabled'}}"></i><h4>Logs de Auditoria </h4> </a>
            </div>      
         </div>
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
               <a href="htt://repositorio.uni.edu.py/repo-uni/public/sites" ><i class="fa fa-firefox fa-5x"></i><h4>Ver Sitio Web</h4> </a>
            </div>
         </div>
    
        </div>         
    </div>
   </div>