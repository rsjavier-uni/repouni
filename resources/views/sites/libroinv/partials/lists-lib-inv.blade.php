<div class="container">
 @foreach ($libro_inv_lists as $libro_inv)
	  <div class="well">
	      <div class="media">
	        <div class="pull-left">
	            {!! HTML::image(asset($libro_inv->path_portada.utf8_decode($libro_inv->portada_name)),'port_img',['class'=>'media-object'])!!}
	        </div>
	        <div class="media-body">
	            <h4 class="media-heading">{!! link_to_route('libroinv.view',$libro_inv->titulo,[$libro_inv->id]) !!}</h4>
	          <p class="text-right">
	          	  Autor/es: @foreach ($libro_inv->invautores as $libroinvautor)
	                           <span class="text-autor">{{utf8_decode($libroinvautor->autor->fullname)}}</span> ,
	                        @endforeach
	          </p>
	          <p>{{utf8_decode(str_limit($libro_inv->descripcion, $limit = 450, $end = '...')) }}</p>
	          <ul class="list-inline list-unstyled">
		            <li><span><i class="glyphicon glyphicon-calendar"></i> {{$libro_inv->año}}</span></li>
		            <li>|</li>
		            <span><i class="glyphicon glyphicon-tags"></i> {{utf8_decode($libro_inv->categoria)}}
		                                  @if ($libro_inv->categoria ==="TFG")
		                                       <i class="glyphicon glyphicon-home"></i> Facultad de {{utf8_decode($libro_inv->invcarreras->first()->carrera->facultad->facultad)}} 
		 
		                                       <i class="glyphicon glyphicon-list-alt"></i> Carrera {{utf8_decode($libro_inv->invcarreras->first()->carrera->carrera)}}
		                                   @endif</span>
		            <li>|</li>
		            <li>
		               <span><i class="glyphicon glyphicon-briefcase"></i> {!! link_to_route('sites.area',' '.$libro_inv->area->area,[$libro_inv->area->id],array('title'=>'Area de Estudio')) !!}</span> 
		            </li>
		           @if ($libro_inv->cod_doi <> "")
			            <li>|</li>
			             <li> <b>Código DOI: </b>
			                  {{utf8_decode($libro_inv->cod_doi)}} 
			            </li>
			        @endif   
		            <li>|</li>
		            <li>
		              <span>{!! link_to('https://www.facebook.com/sharer/sharer.php?u='.url('/').'/sites/investigacion/'.$libro_inv->id.'/view&title='.$libro_inv->titulo,'',['target'=>'_blank','class'=>'fa fa-facebook-square','title'=>'Facebook']) !!}</span>
		              <span>{!! link_to('https://twitter.com/intent/tweet?url='.url('/').'/sites/investigacion/'.$libro_inv->id.'/view&title='.$libro_inv->titulo,'',['target'=>'_blank','class'=>'fa fa-twitter-square','title'=>'Twitter']) !!}</span>
		              <span>{!! link_to('https://plus.google.com/share?url='.url('/').'/sites/investigacion/'.$libro_inv->id.'/view&title='.$libro_inv->titulo,'',['target'=>'_blank','class'=>'fa fa-google-plus-square','title'=>'Google+']) !!}</span>
		            </li>
	            </ul>
	       </div>
	    </div>
	   </div>
  @endforeach 
   <div class="pull-right">
     <div class="dataTables_paginate paging_bootstrap">
          {!!$libro_inv_lists->appends(request()->input())->render() !!}
     </div>
   </div>
</div>
