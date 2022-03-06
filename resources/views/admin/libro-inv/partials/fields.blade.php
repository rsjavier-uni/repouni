   <div class="form-group">
         {!!Form::hidden('libroinv_id', isset($libroinv->id)?$libroinv->id:"",['id'=>'txt_libroinv_id']) !!}
          {!! Form::label('año','Año: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-2">
             {!! Form::text('año',null, ['placeholder'=>'Año','id'=>'txt_año','class' => 'form-control','maxlength' =>'4']) !!}
           </div>
              {!! Form::label('titulo','Titulo: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-6">
              {!! Form::text('titulo',null, ['placeholder'=>'Titulo','class' => 'form-control','maxlength' =>'300']) !!}
            </div>
              

    </div>
    <div class="form-group">
       {!! Form::label('cod_doi','Código DOI: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
      <div class="col-sm-5">
        {!! Form::text('cod_doi',null, ['placeholder'=>'Cód. DOI','class' => 'form-control','maxlength' =>'40']) !!}
      </div>
     </div>
        <div class="form-group">
        {!! Form::label('autor','Autor: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
              {!! Form::select('autores[]',$autores,null, ['class' => 'form-control','id'=>'slcAutor', 'multiple'=>'true']) !!}
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
              @if(isset($libroinv->portada_name)) 
              <div class="pull-right"> <i class="icon_image" title="new"></i>&nbsp&nbsp
              	{!!link_to(asset($libroinv->path_portada.utf8_decode($libroinv->portada_name)),$libroinv->portada_name,array('target'=>'_blank'))!!}
              </div>	 
             @endif
              
           </div>
          {!! Form::label('archivo','Archivo: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::file('archivo',null,['class'=>'filestyle', 'data-buttonName'=>'btn-primary']) !!}
               @if(isset($libroinv->document_name)) 
               <div class="pull-right"> <i class="icon_document_alt" title="new"></i>&nbsp&nbsp
               	{!!link_to(asset($libroinv->path_document.utf8_decode($libroinv->document_name)),$libroinv->document_name,array('target'=>'_blank'))!!}
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
             {!! Form::label('categoria','Categoria: ',['class'=>'col-sm-2 control-label','for'=>'textinput','id'=>'lb_categoria']) !!}
             <div class="col-sm-3">
               {!! Form::select('categoria', [''=>'-- Seleccione --','TFG' => 'Trabajo Final de Grado', 'Post Grado' => 'Trabajo de Post Grado','Investigación'=>'Proyecto de Investigación'], null,['class' => 'form-control','id'=>'sltCategoria','onChange'=>'changeSltCategoria();']) !!}
             </div>
              <div id="div_categoria" style="display:none;">
                {!! Form::label('facultad','Facultad: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
                <div class="col-sm-3">
                 {!! Form::select('facultad',$facultades,null,['class' => 'form-control','id'=>'sltFacultad','onChange'=>'changeSltFacultad();']) !!}
                </div>
                 {!! Form::label('carrera','Carrera: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
                <div class="col-sm-3">
                 {!! Form::select('carrera',$carreras,null,['class' => 'form-control','id'=>'sltCarrera']) !!}
                </div>
              </div>
         </div>
         @if (isset($libroinv->id))
             <div class="form-group">
                {!! Form::label('indice','Indice:',['class'=>'col-sm-1 col-lg-offset-1 control-label','for'=>'textinput']) !!}
                <div class="col-sm-2">
                  {!! Form::button('<i class="fa fa-plus"></i> Agregar Indice', ['class' => 'btn btn-info','data-title'=>'Popup','data-toggle'=>'modal','data-target'=>'#open-popup']) !!}
                </div>
                {!! Form::label('cita','Cita:',['class'=>'col-sm-1 control-label','for'=>'textinput']) !!}
                <div class="col-sm-2">
                  {!! Form::button('<i class="fa fa-plus"></i> Agregar Cita', ['class' => 'btn btn-info','data-title'=>'Popup','data-toggle'=>'modal','data-target'=>'#open-popup-cita']) !!}
                </div>
             </div>
         @endif
 

