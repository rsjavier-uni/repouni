 <div class="form-group">
   {!! Form::label('nombre','Nombre (*): ',['class'=>'control-label col-sm-2','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::text('nombre',null, ['placeholder'=>'Nombre ','class' => 'form-control','maxlength' =>'25']) !!}
    </div>
    {!! Form::label('apellido','Apellido (*): ',['class'=>'control-label col-sm-2','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::text('apellido',null, ['placeholder'=>'Apellido ','class' => 'form-control','maxlength' =>'25']) !!}
    </div>
 </div>
 <div class="form-group">
   {!! Form::label('email','Email (*): ',['class'=>'control-label col-sm-2','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::text('email',null, ['placeholder'=>'Email ','class' => 'form-control','maxlength' =>'35']) !!}
    </div>
    {!! Form::label('Organizacion','Organización (*): ',['class'=>'control-label col-sm-2','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::text('organizacion',null, ['placeholder'=>'Organización/Universidad','class' => 'form-control','maxlength' =>'100']) !!}
    </div>
 </div>
 <div class="form-group">
   {!! Form::label('ocupacion','Ocupación (*): ',['class'=>'control-label col-sm-2','for'=>'textinput']) !!}
    <div class="col-sm-3">
        {!! Form::select('ocupacion', [''=>'-- Seleccione --','Investigador' => 'Investigador', 'Docente' => 'Docente','Estudiante' => 'Estudiante'], null,['class' => 'form-control']) !!}
    </div>
   {!! Form::label('username','Username (*): ',['class'=>'control-label col-sm-2 col-lg-offset-1','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::text('username',null, ['placeholder'=>'Username ','class' => 'form-control','maxlength' =>'30']) !!}
    </div>
 </div>
  <div class="form-group">
  	 {!! Form::label('password','Password: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
     <div class="col-sm-4">
        {!! Form::password('password', ['placeholder'=>'Password','class' => 'form-control','id'=>'txt_password_user','maxlength' =>'25']) !!}
       <p><i class="glyphicon glyphicon-eye-open" title="new"></i>&nbsp<a data-toggle="modal" onclick="showPassword();" >Mostrar</a></p>
     </div>
     {!! Form::label('password_confirmation','Password Confirmation: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
     <div class="col-sm-4">
        {!! Form::password('password_confirmation', ['placeholder'=>'Password Confirmation','class' => 'form-control','id'=>'txt_password_conf_user','maxlength' =>'25']) !!}
     </div>
  </div>
  <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <div class="pull-right">
         {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
       </div>
     </div>
   </div>