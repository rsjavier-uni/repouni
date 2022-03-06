
{!! Form::model(isset($area)?$area:'',array('route' => ['area.search'],'role' => 'form', 'id' => 'areaFormSearch', 'class' =>'form-inline col-lg-offset-4', 'method' =>'get')) !!}
   <div class="form-group">
     {!! Form::text('area',null, ['placeholder'=>'Area','class' => 'form-control ','maxlength' =>'40']) !!}
  </div>
   {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
