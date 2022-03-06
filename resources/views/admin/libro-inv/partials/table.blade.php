 <table class="table table-striped table-advance table-hover">
    <thead>
       <tr>
          <th>Año</th>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Area</th>
          <th>Archivo</th>
          <th>Idioma</th>
          <th>Categoria</th>
          <th><i class="icon_cogs"></i>Acciones</th>
       </tr>
    </thead>
    <tbody> 
       @foreach ($libroinvs as $libroinv)
          <tr>
             <td id="id"style="display:none">{{$libroinv->id}}</td>
             <td>{{utf8_decode($libroinv->año)}}</td>
             <td>{{ utf8_decode($libroinv->titulo)}}</td>
             <td> @foreach ($libroinv->invautores as $libroinvautor)
                    <p>{{ utf8_decode($libroinvautor->autor->fullname)}}</p>
                  @endforeach
             </td>
             <td>{{utf8_decode($libroinv->area->area)}}</td>
             <td>{!!link_to(asset($libroinv->path_document.utf8_decode($libroinv->document_name)),$libroinv->document_name,array('target'=>'_blank'))!!}</td>
             <td>{{ utf8_decode($libroinv->idioma)}}</td>
             <td>{{utf8_decode($libroinv->categoria)}}</td>
             <td><div class="btn-group">
             	    {!! link_to_route('libroinv.edit','',[$libroinv->id],array('class'=>$current_usuario->can('libroinv.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                    {!! link_to('','',['onClick'=>'openPopupDeleteLibroInv('.$libroinv->id.')','class'=>$current_usuario->can('libroinv.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                 </div>
             </td>
          </tr>
        @endforeach
     </tbody>                
  </table>
  