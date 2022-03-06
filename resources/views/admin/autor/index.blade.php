@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	@can('autor.index') 
	    <div class="row">
	      <div class="col-lg-10">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Lista de Autores</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Lista de Autores</li>
	        </ol>
	      </div>
	     </div>
	        <div class="row">
	          <div class="col-md-11">
	            <div class="col-md-5 col-lg-offset-3">
	             @include('admin.global-partials.messages')
	           </div>
	          </div> 
	          @include('admin.autor.partials.search')
	          <div class="col-lg-10">
	            <section class="panel">
	              <header class="panel-heading">Autores</header>
	               @include('admin.autor.partials.table')
	            </section>
	            Hay {{$autors->total()}} registros
	            <div class="pull-right">
	                <div class="dataTables_paginate paging_bootstrap">
	                      {!!$autors->render()!!}
	                </div>
	            </div>
	          </div> 
	       </div>
        @else
          @include('admin.global-partials.perm-access-denied')
     @endcan   
  </section>
</section>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
       @include('admin.autor.partials.delete-popup')
</div>