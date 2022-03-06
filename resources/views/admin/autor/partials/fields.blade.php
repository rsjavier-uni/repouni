<div class="panel-body">
    <div class="form">
        <div class="form-group">
          {!! Form::label('nombre','Nombre: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('nombre',null, ['placeholder'=>'Nombre','class' => 'form-control','maxlength' =>'25']) !!}
           </div>
              {!! Form::label('apellido','Apellido: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::text('apellido',null, ['placeholder'=>'Apellido','class' => 'form-control','maxlength' =>'25']) !!}
            </div>
        </div>
        <div class="form-group">
         {!! Form::label('direccion','Direccion: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::textarea('direccion', null, ['placeholder'=>'Dirección','class' => 'form-control','rows' => '4', 'cols' => '40','maxlength'=>'60']) !!}
          </div>
             {!! Form::label('telefono','Telefono: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::text('telefono', null,['placeholder'=>'xxx xxxxxx ó xxxx xxxxxxx','class' => 'form-control','maxlength' =>'15']) !!}
            </div>
        </div>
         <div class="form-group">
         {!! Form::label('email','Email: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::text('email', null,['placeholder' => 'example@mail.com','class' => 'form-control','maxlength' =>'35']) !!}
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
 

