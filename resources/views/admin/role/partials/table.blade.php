 <table class="table table-striped table-advance table-hover">
     <thead>
         <tr>
           <th>Rol</th>
           <th>Slug</th>   
           <th><i class="icon_cogs"></i>Acciones</th>
         </tr>
     </thead>
     <tbody> 
        @foreach ($roles as $role)
           <tr>
              <td id="id"style="display:none">{{$role->id}}</td>
              <td>{{utf8_decode($role->name)}}</td>
              <td>{{utf8_decode($role->slug)}}</td>
              <td><div class="btn-group">
              	      {!! link_to_route('role.edit','',[$role->id],array('class'=>$current_usuario->can('role.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                      {!! link_to('','',['onClick'=>'openPopupDeleteRole('.$role->id.')','class'=>$current_usuario->can('role.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                   </div>
              </td>
           </tr>
         @endforeach
      </tbody>                
 </table>
  