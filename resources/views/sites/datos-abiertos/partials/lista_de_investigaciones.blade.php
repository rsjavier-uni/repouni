<div class="container">
    @foreach ($investigacion_lists as $investigacion)
	    <div class="well">
	        <div class="media">
                <div class="pull-left">
                    {!! HTML::image(asset($investigacion->path_portada.utf8_decode($investigacion->nombre_portada)),'port_img',['class'=>'media-object'])!!}
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{!! link_to_route('sites.datos-abiertos.view',$investigacion->titulo,[$investigacion->id]) !!}</h4>
                    <p class="text-right">
                        Autor: <span class="text-autor">{{utf8_decode($investigacion->autor)}}</span>
                    </p>
                    <p>{{utf8_decode(str_limit($investigacion->descripcion, $limit = 450, $end = '...')) }}</p>
                    <ul class="list-inline list-unstyled">
                        <li><span><i class="glyphicon glyphicon-calendar"></i> {{$investigacion->anho}}</span></li>
                        <li>|</li>
                        <span><i class="glyphicon glyphicon-tags"></i> {{utf8_decode($investigacion->programa->titulo)}}</span>
                        <li>|</li>
                        <li>
                        <span>
                            <i class="glyphicon glyphicon-briefcase"></i> {{utf8_decode($investigacion->area->area)}}
                        </span> 
                        </li>
                            <li>|</li>
                            <li>
                            <span>{!! link_to('https://www.facebook.com/sharer/sharer.php?u='.url('/').'/sites/investigacion/'.$investigacion->id.'/view&title='.$investigacion->titulo,'',['target'=>'_blank','class'=>'fa fa-facebook-square','title'=>'Facebook']) !!}</span>
                            <span>{!! link_to('https://twitter.com/intent/tweet?url='.url('/').'/sites/investigacion/'.$investigacion->id.'/view&title='.$investigacion->titulo,'',['target'=>'_blank','class'=>'fa fa-twitter-square','title'=>'Twitter']) !!}</span>
                        </li>
                    </ul>
	            </div>
	        </div>
	    </div>
    @endforeach 
    <div class="pull-right">
        <div class="dataTables_paginate paging_bootstrap">
            {!!$investigacion_lists->appends(request()->input())->render() !!}
        </div>
    </div>
</div>
