<table class="table table-striped table-advance table-hover">
    <thead>
       <tr>
            <th>Año</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Area</th>
            <th>Programa</th>
            <th>Archivo</th>
            <th>Idioma</th>
            <th><i class="icon_cogs"></i>Acciones</th>
       </tr>
    </thead>
    <tbody> 
        @foreach ($investigaciones as $investigacion)
          <tr>
                <td id="id"style="display:none">{{ $investigacion->id }}</td>
                <td>{{ utf8_decode($investigacion->anho) }}</td>
                <td>{{ utf8_decode($investigacion->titulo )}}</td>
                <td>{{ utf8_decode($investigacion->autor )}}</td>
                <td>{{ utf8_decode($investigacion->area->area) }}</td>
                <td>{{ utf8_decode($investigacion->programa->titulo) }}</td>
                <td>{!!link_to(asset($investigacion->path_document.utf8_decode($investigacion->nombre_documento)),$investigacion->nombre_documento,array('target'=>'_blank'))!!}</td>
                <td>{{ utf8_decode($investigacion->idioma) }}</td>
                <td><div class="btn-group">
                        {!! link_to_route('datos-abiertos.edit','',[$investigacion->id],array('class'=>$current_usuario->can('datos-abiertos.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                        {!! link_to('','',['onClick'=>'openPopupDeleteInvestigacion('.$investigacion->id.')','class'=>$current_usuario->can('datos-abiertos.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                    </div>
                </td>
          </tr>
        @endforeach
    </tbody>                
</table>
  