{!! Form::model(isset($programa)?$programa:'',array('route' => ['programa.search'],'role' => 'form', 'id' => 'programaFormSearch', 'class' =>'form-inline col-lg-offset-4', 'method' =>'get')) !!}
    <div class="form-group">
        {!! Form::text('titulo',null, ['placeholder'=>'Titulo','class' => 'form-control ','maxlength' =>'40']) !!}
        {!! Form::text('anho_acreditacion',null, ['placeholder'=>'Año de Acreditación','class' => 'form-control ','maxlength' =>'40']) !!}
    </div>
    {!! Form::button('<span class="icon_search" aria-hidden="true"></span>', ['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
