<table class="table table-striped table-advance table-hover">
    <thead>
        <tr>
            <th>Programa</th>
            <th>Año de Acreditación</th>
            <th><i class="icon_cogs"></i>Acciones</th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($programas as $programa)
            <tr>
                <td id="id"style="display:none">{{$programa->id}}</td>
                <td>{{utf8_decode($programa->titulo)}}</td>
                <td>{{utf8_decode($programa->anho_acreditacion)}}</td>
                <td><div class="btn-group">
                        {!! link_to_route('programa.edit','',[$programa->id],array('class'=>$current_usuario->can('programa.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                        {!! link_to('','',['onClick'=>'openPopupDeletePrograma('.$programa->id.')','class'=>$current_usuario->can('programa.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>                
 </table>
  