<div class="panel-body">
   <div class="form">
      <div class="form-group">
         {!! Form::label('año','Año: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
         <div class="col-sm-2">
         {!! Form::text('anho_acreditacion',null, ['placeholder'=>'Año','id'=>'txt_año','class' => 'form-control','maxlength' =>'4']) !!}
         </div>

         {!! Form::label('programa','Programa: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
         <div class="col-sm-6">
            {!! Form::text('titulo',null, ['placeholder'=>'Programa','class' => 'form-control','maxlength' =>'40']) !!}
         </div>
      </div>
      <div class="form-group">
         {!! Form::label('descripcion','Descripción: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
         <div class="col-sm-4">
            {!! Form::textarea('descripcion', null, ['placeholder'=>'Descripción','class' => 'form-control','rows' => '8', 'cols' => '40','maxlength'=>'5000']) !!}
         </div>
      </div>
      <div class="form-group">
         <div class="col-lg-offset-5">
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
         </div>
      </div>
   </div>
</div>