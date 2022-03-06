 <table class="table table-striped table-advance table-hover">
    <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Dirección</th>
         <th>Teléfono</th>
         <th>Email</th>
         <th><i class="icon_cogs"></i>Acciones</th>
        </tr>
     </thead>
     <tbody> 
       @foreach ($autors as $autor)
          <tr>
             <td id="id"style="display:none">{{$autor->id}}</td>
             <td>{{utf8_decode($autor->nombre)}}</td>
             <td>{{utf8_decode($autor->apellido)}}</td>
             <td>{{utf8_decode($autor->direccion)}}</td>
             <td>{{$autor->telefono}}</td>
             <td>{{$autor->email}}</td>
             <td><div class="btn-group">
                    {!! link_to_route('autor.edit','',[$autor->id],array('class'=>$current_usuario->can('autor.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                    {!! link_to('','',['onClick'=>'openPopupDeleteAutor('.$autor->id.')','class'=>$current_usuario->can('autor.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                   </div>
                  </td>
              </tr>
             @endforeach
          </tbody>                
  </table>
  