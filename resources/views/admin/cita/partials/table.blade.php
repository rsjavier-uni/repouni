<div class="container">
    <div class="row">
       <div class="col-md-6">
          <div class="table-responsive">
             <table id="mytable" class="table table-bordred table-striped">    
               <thead>
                   <th>#</th>
                   <th>Cita</th>
                   <th>Acciones</th>
               </thead>
                <tbody>
                  @php ($i = 1)
                  @foreach ($citas as $cita)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$cita->cita}}</td>
                      <td>
                      	  {!! Form::button('<span class="glyphicon glyphicon-pencil"></span>', ['onClick'=>'editCitaForm('.$cita->id.')','class' => 'btn btn-primary btn-xs','data-title'=>'Edit','data-toggle'=>'modal','data-target'=>'#edit']) !!}
                      	  {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', ['onClick'=>'deleteCitaRow('.$cita->id.')','class' => 'btn btn-danger btn-xs','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
                      </td>
                    </tr>
                 @endforeach
               </tbody>
             </table>
            <div class="pull-right">
              <div class="dataTables_paginate paging_bootstrap">
                  {!! $citas->render()!!} 
             </div>      
           </div>
        </div>
    </div>
</div>
</div>

