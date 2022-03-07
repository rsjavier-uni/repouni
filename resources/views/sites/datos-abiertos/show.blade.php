<html>
    @include('sites.global-partials.header')
    @include('sites.global-partials.menu')  
 
    <div id='content' class='row-fluid'>
        <div class='col-sm-2 sidebar'>
            <h2 class="page-header">Investigacion</h2>
            <ul class="nav nav-tabs nav-stacked">
                <li>{!! link_to(asset($investigacion->path_document.utf8_decode($investigacion->nombre_documento)),'Descargar Archivo',array('enabled','download'=>'download'))!!}</li>
                <li>{!! link_to_route('sites.datos-abiertos.doc_view','Visualizar Archivo', [$investigacion->id]) !!}</li>
            </ul>
        </div>
        

    </div>

    <div class='col-sm-8 main'>
        <h4 class="page-header">{{utf8_decode($investigacion->titulo)}}</h4>
        <p>
            <div class="col-xs-6 col-md-3 pull-right">
                <a href="#" class="thumbail">
                    {!! Form::image(asset($investigacion->path_portada.utf8_decode($investigacion->nombre_portada)),'port_img',['class'=>'img-responsive','alt'=>'image'])!!}
                </a>
            </div>
            {!! Form::label('autor','Autor: ',['class'=>'control-label','for'=>'textinput']) !!}
            {{utf8_decode($investigacion->autor)}}
        </p>
        <p>{!! Form::label('Año','Año: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{$investigacion->anho}}
        </p>
        <p>{!! Form::label('area','Area: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($investigacion->area->area)}}
        </p>
        <p>{!! Form::label('programa','Programa: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($investigacion->programa->titulo)}}
        </p>
        <p>{!! Form::label('idioma','Idioma: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($investigacion->idioma)}}
        </p>
        <p>{!! Form::label('descripción','Descripción: ',['class'=>'control-label','for'=>'textinput']) !!}
           {{utf8_decode($investigacion->descripcion)}}
        </p>
    </div>
    <div class='col-sm-2 sidebar'>
        <h4>Compartir</h4>
        <ul class="social-network social-circle">
            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/sites/investigacion/{{$investigacion->id}}/view&title={{$investigacion->titulo}}" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{url('/')}}/sites/investigacion/{{$investigacion->id}}/view&title={{$investigacion->titulo}}" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
        </ul>	
    </div>
</html>
