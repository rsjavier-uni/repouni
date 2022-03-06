 <table class="table table-striped table-advance table-hover">
    <thead>
       <tr>
       	 <th>Nombre</th>
       	 <th>Apellido</th>
       	 <th>Organización</th>
       	 <th>Ocupación</th>
         <th><i class="icon_profile"></i>Username</th>
          <th><i class="icon_cogs"></i>Acciones</th>
        </tr>
     </thead>
     <tbody> 
        @foreach ($usuarios_regs as $usuario)
           <tr>
               <td id="id"style="display:none">{{$usuario->id}}</td>
               <td>{{utf8_decode($usuario->nombre)}}</td>
               <td>{{utf8_decode($usuario->apellido)}}</td>
               <td>{{utf8_decode($usuario->organizacion)}}</td>
               <td>{{utf8_decode($usuario->ocupacion)}}</td>
               <td>{{utf8_decode($usuario->username)}}</td>
               <td><div class="btn-group">
               	     {!! link_to_route('usuario-reg.edit','',[$usuario->id],array('class'=>$current_usuario->can('usuario.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                     {!! link_to('','',['onClick'=>'openPopupDeleteUsuarioRegister('.$usuario->id.')','class'=>$current_usuario->can('usuario.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                   </div>
               </td>
           </tr>
         @endforeach
      </tbody>                
  </table>

         
  