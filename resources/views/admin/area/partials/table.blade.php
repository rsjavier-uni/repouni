 <table class="table table-striped table-advance table-hover">
    <thead>
       <tr>
          <th>Area</th>
          <th><i class="icon_cogs"></i>Acciones</th>
       </tr>
    </thead>
   <tbody> 
      @foreach ($areas as $area)
        <tr>
           <td id="id"style="display:none">{{$area->id}}</td>
           </td>
           <td>{{utf8_decode($area->area)}}</td>
           <td><div class="btn-group">
                 {!! link_to_route('area.edit','',[$area->id],array('class'=>$current_usuario->can('area.edit')?'btn btn-success icon_pencil-edit enabled':'btn btn-success icon_pencil-edit disabled')) !!}
                 {!! link_to('','',['onClick'=>'openPopupDeleteArea('.$area->id.')','class'=>$current_usuario->can('area.destroy')?'btn btn-danger icon_close_alt2 enabled':'btn btn-danger icon_close_alt2 disabled','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
               </div>
           </td>
         </tr>
      @endforeach
   </tbody>                
 </table>
  