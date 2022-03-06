 <html>
 @include('sites.global-partials.header')
 @include('sites.global-partials.menu') 
 <div id='content' class='row-fluid'>
    <div class='col-sm-3 sidebar'>
	   <div class="list-group">
          <div class="media col-sm-5">
          </br>
             <figure class="pull-left">
                 {!! Form::image(asset($libroinv->path_portada.utf8_decode($libroinv->portada_name)),'port_img',['class'=>'img-responsive','alt'=>'image'])!!}
             </figure>
          </div>
          <div class="col-sm-7">
             <h5 class="document-title">{{utf8_decode($libroinv->titulo)}} </h5>
             <p><b>Autor/es: </b>
                  @foreach ($libroinv->invautores as $libroinvautor)
                    {{utf8_decode($libroinvautor->autor->fullname)}},
                  @endforeach 
             </p>
             <p><b>Publicado: </b>{{$libroinv->año}}</p>
             <p>{!! link_to_route('libroinv.view','Registro Detallado', [$libroinv->id]) !!} </p>
         </div>
     </div>
        <h4>Contenido</h4>
	      <div class="row">
	         <div class="col-sm-11">
	            <div class="list-group list-cust" id="list-cust">
	             @foreach ($libroinv->indices as $indice)  
	               {!! link_to('#',$indice->indice,array('onClick'=>'gotoPage('.$indice->pagina.')','class' => 'list-group-item','title'=>'Pág: '.$indice->pagina)) !!}
	             @endforeach
	            </div>
	        </div>
         </div>
   </div>
      <div class='col-sm-9 main'>
      	<p></p>
      	<div id="pdf_embed_view">
       	  <embed src="{{asset($libroinv->path_document.utf8_decode($libroinv->document_name))}}" width="97%" height="550px" id="pdf_embed"></embed>
        </div>
      </div>
    </div>
    @include('sites.global-partials.footer')
 </html>