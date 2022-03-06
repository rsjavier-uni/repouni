
{!! Form::model(isset($role)?$role:'',array('route' => ['role.search'],'role' => 'form', 'id' => 'roleFormSearch', 'class' =>'form-inline col-lg-offset-4', 'method' =>'get')) !!}
   <div class="form-group">
     {!! Form::text('role',null, ['placeholder'=>'Rol','class' => 'form-control ','maxlength' =>'40']) !!}
  </div>
   {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
