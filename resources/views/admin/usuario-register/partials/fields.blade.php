<div class="panel-body">
    <div class="form">
    	 <div class="form-group">
    	 {!!Form::hidden('usuario_id', isset($usuario_reg->id)?$usuario_reg->id:"",['id'=>'txt_usuario_reg_id']) !!}
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
          {!! Form::label('email','Email: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('email',null, ['placeholder'=>'Email','class' => 'form-control','maxlength' =>'40']) !!}
           </div>
              {!! Form::label('Organizacion','Organización: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::text('organizacion',null, ['placeholder'=>'Organización','class' => 'form-control','maxlength' =>'100']) !!}
            </div>
        </div>
        <div class="form-group">
          {!! Form::label('ocupacion','Ocupación: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-3">
             {!! Form::select('ocupacion', [''=>'-- Seleccione --','Investigador' => 'Investigador', 'Docente' => 'Docente','Estudiante' => 'Estudiante'], null,['class' => 'form-control']) !!}
          </div>
          {!! Form::label('username','Username: ',['class'=>'col-sm-2 col-lg-offset-1 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('username',null, ['placeholder'=>'Username','class' => 'form-control','maxlength' =>'25']) !!}
          </div>
        </div>
        <div class="form-group">
           {!! Form::label('password','Password: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::password('password', ['placeholder'=>'Password','class' => 'form-control','id'=>'txt_password_user_reg','maxlength' =>'25']) !!}
               <i class="glyphicon glyphicon-eye-open" title="new"></i>&nbsp {!! link_to('#','Mostrar',[ 'onClick'=>'showPassword();','data-toggle'=>'modal']) !!}
            </div>
            {!! Form::label('password_confirmation','Password Confirmation: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
            <div class="col-sm-4">
              {!! Form::password('password_confirmation', ['placeholder'=>'Password Confirmation','class' => 'form-control','id'=>'txt_password_conf','maxlength' =>'25']) !!}
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
 

