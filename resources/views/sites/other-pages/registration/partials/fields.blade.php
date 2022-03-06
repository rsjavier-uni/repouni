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
 
 </div>
  <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <div class="pull-right">
         {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
       </div>
     </div>
   </div>