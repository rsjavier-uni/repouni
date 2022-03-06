
{!! Form::model(isset($libroinv)?$libroinv:'',array('route' => ['libroinv.search'],'role' => 'form', 'id' => 'libroinvFormSearch', 'class' =>'form col-lg-offset-2', 'method' =>'get')) !!}
   <div class="col-md-5">
     <div class="form-group">
       {!! Form::text('titulo',null, ['placeholder'=>'Titulo','class' => 'form-control ','maxlength' =>'60']) !!}
     </div>
   </div>
   <div class="col-md-3">
     <div class="form-group">
        {!! Form::select('area',$areas,null,['class' => 'form-control','id'=>'sltArea']) !!}
      </div>
   </div>
   <div class="col-md-3">
     <div class="form-group">
        {!! Form::select('categoria', [''=>'-- Seleccione --','TFG' => 'Trabajo Final de Grado', 'Post Grado' => 'Trabajo de Post Grado','Investigación'=>'Investigación'], null,['class' => 'form-control','id'=>'sltCategoria','onChange'=>'changeSltCategoria();']) !!}
     </div>
   </div>
   {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
