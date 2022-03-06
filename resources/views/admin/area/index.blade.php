@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	 @can('area.index')
	    <div class="row">
	      <div class="col-lg-7">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Lista de Areas</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Lista de Areas</li>
	        </ol>
	      </div>
	     </div>
	      <div class="row">
	        <div class="col-md-11">
	          <div class="col-md-5 col-lg-offset-1">
	            @include('admin.global-partials.messages')
	          </div>
	        </div> 
	        @include('admin.area.partials.search')
	        <p></p>
	          <div class="col-lg-7">
	            <section class="panel">
	              <header class="panel-heading">Areas</header>
	               @include('admin.area.partials.table')
	            </section>
	            Hay {{$areas->total()}} registros
	            <div class="pull-right">
	                <div class="dataTables_paginate paging_bootstrap">
	                      {!!$areas->render()!!}
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
       @include('admin.area.partials.delete-popup')
</div>