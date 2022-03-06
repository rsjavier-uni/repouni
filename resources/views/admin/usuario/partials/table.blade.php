 <table class="table table-striped table-advance table-hover">
    <thead>
       <tr>
          <th><i class="icon_profile"></i>Username</th>
          <th>Rol</th>
          <th><i class="icon_cogs"></i>Acciones</th>
        </tr>
     </thead>
     <tbody> 
        @foreach ($usuarios as $usuario)
           <tr>
               <td id="id"style="display:none">{{$usuario->id}}</td>
               <td>{{$usuario->username}}</td>
                <td>{{$usuario->role->name}}</td>
               <td><div class="btn-group">
               	     {!! link_to_route('usuario.edit','',[$usuario->id],array('class'=>$current_usuario->can('usuario.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                     {!! link_to('','',['onClick'=>'openPopupDeleteUsuario('.$usuario->id.')','class'=>$current_usuario->can('usuario.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                   </div>
               </td>
           </tr>
         @endforeach
      </tbody>                
  </table>

         
  