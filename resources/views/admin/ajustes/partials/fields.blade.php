<div class="panel-body">
    <div class="form">
        <div class="form-group">
          {!! Form::label('titulo_sitio','Titulo del Sitio: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('titulo_sitio',null, ['placeholder'=>'Titulo Sitio','class' => 'form-control','maxlength' =>'35']) !!}
          </div>
          {!! Form::label('logo','Logo: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::file('logo',null,['class'=>'filestyle', 'data-buttonName'=>'btn-primary']) !!}
              <div class="pull-right"> <i class="icon_image" title="new"></i>&nbsp&nbsp<a target="_blank" href="{{asset($ajustes->logo_url)}}" >{{$ajustes->logo_filename}}</a></div>
            </div>
        </div>
        <div class="form-group">
          {!! Form::label('path_img_upload','Ruta de Carga de Imágenes: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="input-group col-sm-4">
              <span class="input-group-addon primary"><span>public</span></span>
                  {!! Form::text('path_img_upload',null, ['placeholder'=>'Ubicación','class' => 'form-control','maxlength' =>'35']) !!}
          </div>
          {!! Form::label('path_document_upload','Ruta de Carga de Doc: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="input-group col-sm-4">
              <span class="input-group-addon primary"><span>public</span></span>
                  {!! Form::text('path_document_upload',null, ['placeholder'=>'Ubicación','class' => 'form-control','maxlength' =>'35']) !!}
           </div>
        </div>
         <div class="form-group">
           {!! Form::label('elements_per_page','Pag Cant de Elem por Pag: ',['class'=>'col-sm-3 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::text('elements_per_page', null,['placeholder' => '','class' => 'form-control','maxlength' =>'2','style'=>'width:20%;']) !!}
           </div>
           {!! Form::label('mail to','Para: ',['class'=>'col-sm-1 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::text('mail_to', null,['placeholder' => 'Email','class' => 'form-control','maxlength' =>'40']) !!}
              <span style="font-size:13px;color:green;">Formularios de Contacto y de Registro</span>
          </div>
         </div>
        <div class="form-group">
           <div class="col-lg-offset-5">
              {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
              {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
           </div>
        </div>
     </div>
</div>

 



