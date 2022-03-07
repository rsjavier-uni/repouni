@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')

<section id="main-content">
    <section class="wrapper">
  	    @can('datos-abiertos.index')
	        <div class="row">
	            <div class="col-lg-12">
	                <h3 class="page-header"><i class="fa fa-files-o"></i>Lista de Investigaciones - Datos Abiertos Para la Ciencia</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
                        <li><i class="icon_document_alt"></i>Lista de Investigación</li>
                    </ol>
	            </div>
	        </div>  
	        <div class="row">
	            <div class="col-md-12">
	                <div class="col-md-5 col-lg-offset-3">
	                    @include('admin.global-partials.messages')
	                </div>
	            </div> 
				@include('admin.datos-abiertos.partials.search')
	            <div class="col-lg-12">
	                <section class="panel">
	                    <header class="panel-heading">Investigaciones</header>
						@include('admin.datos-abiertos.partials.table')
	                </section>
	                Hay {{$investigaciones->total()}} registros
                    <div class="pull-right">
                        <div class="dataTables_paginate paging_bootstrap">
                            {!!$investigaciones->render()!!}
                        </div>
                    </div>
	            </div> 
	       </div>
        @else
            @include('admin.global-partials.perm-access-denied')
        @endcan    
</section>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
       @include('admin.datos-abiertos.partials.delete-popup')
</div>