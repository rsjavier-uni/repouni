<div class="panel-body">
    <div class="form">
        <div class="form-group">
          {!! Form::label('area','Area: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-6">
             {!! Form::text('area',null, ['placeholder'=>'Area','class' => 'form-control','maxlength' =>'40']) !!}
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
 

