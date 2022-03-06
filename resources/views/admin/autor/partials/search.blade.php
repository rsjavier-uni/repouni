
{!! Form::model(isset($autor)?$autor:'',array('route' => ['autor.search'],'role' => 'form', 'id' => 'autorFormSearch', 'class' =>'form-inline col-lg-offset-1', 'method' =>'get')) !!}
   <div class="form-group">
     {!! Form::text('nombre',null, ['placeholder'=>'Nombre','class' => 'form-control ','maxlength' =>'25']) !!}
  </div>
  <div class="form-group">
     {!! Form::text('apellido',null, ['placeholder'=>'Apellido','class' => 'form-control ','maxlength' =>'25']) !!}
  </div>
  <div class="form-group">
   {!! Form::text('telefono',null, ['placeholder'=>'Teléfono','class' => 'form-control ','maxlength' =>'15']) !!}
  </div>
  <div class="form-group">
     {!! Form::text('email',null, ['placeholder'=>'Email','class' => 'form-control ','maxlength' =>'35']) !!}
  </div>
   {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
