<div class="panel-body">
    <div class="form">
        <div class="form-group">
          {!!Form::hidden('id',"",['id'=>'txt_cita_id']) !!}
          {!! Form::label('cita','Cita: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-6">
             {!! Form::text('cita',null, ['placeholder'=>'Citar','class' => 'form-control','maxlength' =>'200','id'=>'txt_cita']) !!}
           </div>
           <div class="col-sm-2">
               {!! Form::submit('Agregar', ['class' => 'btn btn-primary','id'=>'btnAddCita']) !!}
           </div>
        </div>
     </div>
</div>

 



