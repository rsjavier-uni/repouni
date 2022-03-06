
{!! Form::model(isset($log_audit)?$log_audit:'',array('route' => ['logs_audits.search'],'role' => 'form', 'id' => 'logAuditFormSearch', 'class' =>'form col-lg-offset-2', 'method' =>'get')) !!}
   <div class="col-md-3">
     <div class="form-group">
        {!! Form::select('username',$users,null,['class' => 'form-control','id'=>'sltUser']) !!}
     </div>
   </div>
   <div class="col-md-3">
     <div class="form-group">
         {!! Form::select('entidad', [''=>'-- Entidad --','App\Models\Ajustes' => 'Ajustes', 'App\Models\Area' => 'Area','App\Models\Autor'=>'Autor'], null,['class' => 'form-control','id'=>'sltEntidad']) !!}
      </div>
   </div>
   <div class="col-md-2">
     <div class="form-group">
        {!! Form::select('orden', ['desc' => 'Desc', 'asc' => 'Asc'], null,['class' => 'form-control','id'=>'sltOrden']) !!}
     </div>
   </div>
   {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary pull-left','type'=>'submit']) !!}
  <div class="col-md-2 col-lg-offset-1">
       {!! Form::button(' <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Vaciar Todo', ['class' => 'btn btn-labeled btn-danger btn3d','data-title'=>'Delete','data-toggle'=>'modal','data-target'=>'#delete']) !!}
  </div>
{!! Form::close() !!}
