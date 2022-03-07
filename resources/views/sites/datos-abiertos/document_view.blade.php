<html>
    @include('sites.global-partials.header')
    @include('sites.global-partials.menu') 
    <p><p>
    <div id='content' class='row-fluid'>
        <div class='col-sm-3 sidebar'>
            <div class="list-group">
                <div class="media col-sm-5">
                    </br>
                    <figure class="pull-left">
                        {!! Form::image(asset($investigacion->path_portada.utf8_decode($investigacion->nombre_portada)),'port_img',['class'=>'img-responsive','alt'=>'image'])!!}
                    </figure>
                </div>
                <div class="col-sm-7">
                    <h5 class="document-title">{{utf8_decode($investigacion->titulo)}} </h5>
                    <p>
                        <b>Autor: </b>
                        {{utf8_decode($investigacion->autor)}}
                    </p>
                    <p><b>Publicado: </b>{{$investigacion->anho}}</p>
                    <p>{!! link_to_route('sites.datos-abiertos.view','Registro Detallado', [$investigacion->id]) !!} </p>
                </div>
            </div>
        </div>
        <div class='col-sm-9 main'>
            <p></p>
            <div id="pdf_embed_view">
            <embed src="{{asset($investigacion->path_document.utf8_decode($investigacion->nombre_documento))}}" width="97%" height="550px" id="pdf_embed"></embed>
            </div>
        </div>
    </div>
</html>