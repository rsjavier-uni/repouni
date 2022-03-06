
{!! Form::model(isset($usuario)?$usuario:'',array('route' => ['usuario.search'],'role' => 'form', 'id' => 'usuarioFormSearch', 'class' =>'form-inline col-lg-offset-3', 'method' =>'get')) !!}
  <div class="form-group">
     {!! Form::text('username',null, ['placeholder'=>'Username','class' => 'form-control ','maxlength' =>'25']) !!}
  </div>
   {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
