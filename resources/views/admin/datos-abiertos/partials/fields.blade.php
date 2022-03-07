<div class="form-group">
    {!!Form::hidden('investigacion_id', isset($investigacion->id)?$investigacion->id:"",['id'=>'txt_investigacion_id']) !!}
    {!! Form::label('anho','Año: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-2">
        {!! Form::text('anho',null, ['placeholder'=>'Año','id'=>'txt_año','class' => 'form-control','maxlength' =>'4']) !!}
    </div>
    {!! Form::label('titulo','Titulo: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-6">
        {!! Form::text('titulo',null, ['placeholder'=>'Titulo','class' => 'form-control','maxlength' =>'300']) !!}
    </div>      
</div>

<div class="form-group">
    {!! Form::label('autor','Autor: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::text('autor',null, ['placeholder'=>'Autor','id'=>'txt_autor','class' => 'form-control','maxlength' =>'100']) !!}
    </div>
    {!! Form::label('descripcion','Descripción: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::textarea('descripcion', null, ['placeholder'=>'Descripción','class' => 'form-control','rows' => '8', 'cols' => '40','maxlength'=>'5000']) !!}
    </div>
</div>
      
<div class="form-group">
    {!! Form::label('portada','Foto Portada: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::file('portada',null,['class'=>'filestyle', 'data-buttonName'=>'btn-primary']) !!}
        @if(isset($investigacion->nombre_portada)) 
            <div class="pull-right"> <i class="icon_image" title="new"></i>&nbsp&nbsp
              	{!!link_to(asset($investigacion->path_portada.utf8_decode($investigacion->nombre_portada)),$investigacion->nombre_portada,array('target'=>'_blank'))!!}
            </div>	 
        @endif      
    </div>
    {!! Form::label('archivo','Archivo: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-4">
        {!! Form::file('archivo',null,['class'=>'filestyle', 'data-buttonName'=>'btn-primary']) !!}
        @if(isset($investigacion->nombre_documento)) 
            <div class="pull-right"> <i class="icon_document_alt" title="new"></i>&nbsp&nbsp
               	{!!link_to(asset($investigacion->path_document.utf8_decode($investigacion->nombre_documento)),$investigacion->nombre_documento,array('target'=>'_blank'))!!}
            </div> 
        @endif
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('area','Area: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-3">
        {!! Form::select('area_id',$areas,null,['class' => 'form-control','id'=>'sltArea']) !!}
    </div>
    {!! Form::label('idioma','Idioma: ',['class'=>'col-sm-2 col-lg-offset-1 control-label','for'=>'textinput']) !!}
    <div class="col-sm-3">
        {!! Form::select('idioma', [''=>'-- Seleccione --','Español' => 'Español', 'Ingles' => 'Ingles'], null,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('programa','Programa Acreditado: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
    <div class="col-sm-3">
        {!! Form::select('programa_id',$programas,null,['class' => 'form-control','id'=>'sltPrograma']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-5">
       {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
       {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
 </div>