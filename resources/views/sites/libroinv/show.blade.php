 <html>
 @include('sites.global-partials.header')
 @include('sites.global-partials.menu')  
 <div id='content' class='row-fluid'>
    <div class='col-sm-2 sidebar'>
        <h4>Registro detallado</h4>
        <ul class="nav nav-tabs nav-stacked">
          <li>{!! link_to(asset($libroinv->path_document.utf8_decode($libroinv->document_name)),'Descargar Archivo',array('class'=>Auth::guard('webregister')->user()?'enabled':'disabled','download'=>'download'))!!}</li>
          <li>{!! link_to_route('sites.doc_view','Visualizar Archivo', [$libroinv->id]) !!}</li>
          <li>{!! link_to('#accordion-cat-1','Indice') !!}</ul>
      </div>
      <div class='col-sm-8 main'>
        <h4 class="page-header">{{utf8_decode($libroinv->titulo)}}</h4>
        <p><div class="col-xs-6 col-md-3 pull-right">
             <a href="http://cnn.com" class="thumbnail">
                {!! Form::image(asset($libroinv->path_portada.utf8_decode($libroinv->portada_name)),'port_img',['class'=>'img-responsive','alt'=>'image'])!!}
             </a>
           </div>
            {!! Form::label('autores','Autores: ',['class'=>'control-label','for'=>'textinput']) !!}
              @foreach ($libroinv->invautores as $libroinvautor)
                       {{utf8_decode($libroinvautor->autor->fullname)}},
              @endforeach 
       </p>
       <p>{!! Form::label('Año','Año: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{$libroinv->año}}
       </p>
       <p>{!! Form::label('descripción','Descripción: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($libroinv->descripcion)}}
       </p>
        <p>{!! Form::label('area','Area: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($libroinv->area->area)}}
       </p>
       <p>{!! Form::label('idioma','Idioma: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($libroinv->idioma)}}
       </p>
       <p>
       	   {!! Form::label('categoria','Categoria: ',['class'=>'control-label','for'=>'textinput']) !!}
             {{utf8_decode($libroinv->categoria)}}
           @if ($libroinv->categoria ==="TFG")
             {!! Form::label('facultad','Facultad: ',['class'=>'control-label col-lg-offset-1','for'=>'textinput']) !!}
             	{{utf8_decode($libroinv->invcarreras->first()->carrera->facultad->facultad)}}
            <p>{!! Form::label('Carrera','Carrera: ',['class'=>'control-label ','for'=>'textinput']) !!}
             	{{utf8_decode($libroinv->invcarreras->first()->carrera->carrera)}}
             </p>
           @endif   
             <p>{!! Form::label('cod_doi','Código DOI: ',['class'=>'control-label ','for'=>'textinput']) !!}
              {{utf8_decode($libroinv->cod_doi)}}
             </p>
       </p>
      <div class="panel-group col-sm-9" id="accordion-cat-1">
          <div class="panel panel-default panel-faq">
             <div class="panel-heading">
               <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-1">
                 <h4 class="panel-title"> 
                   <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>Indice
                 </h4>
              </a>
            </div>
           <div id="faq-cat-1-sub-1" class="panel-collapse collapse">
             <div class="card-block p-0">
            	<div class="fading-side-menu container" data-spy="affix" data-offset-top="350">
                   <ul class="list-unstyled">
                     @foreach ($libroinv->indices as $indice)       
                       <li><a href="#"> <span class="fa fa-angle-double-right text-primary"></span> {{utf8_decode($indice->indice)}}
                           </a>
                       </li>
                     @endforeach
                   </ul>
                   </div>
              </div>
          </div>
           </div>
     </div>
       	 
      </div>
      <div class='col-sm-2 sidebar'>
        <h4>Compartir</h4>
        <ul class="social-network social-circle">
           <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/sites/investigacion/{{$libroinv->id}}/view&title={{$libroinv->titulo}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
           <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{url('/')}}/sites/investigacion/{{$libroinv->id}}/view&title={{$libroinv->titulo}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
           <li><a target="_blank" href="https://plus.google.com/share?url={{url('/')}}/sites/investigacion/{{$libroinv->id}}/view&title={{$libroinv->titulo}}" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
        </ul>	
      </div>
    </div>
   @include('sites.global-partials.footer')
</html>