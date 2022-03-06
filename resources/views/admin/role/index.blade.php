@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	 @can('role.index')
	    <div class="row">
	      <div class="col-lg-7">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Lista de Roles de Usuarios</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Lista de Roles de Usuarios</li>
	        </ol>
	      </div>
	     </div>
	       <div class="row">
	         <div class="col-md-11">
	          <div class="col-md-5 col-lg-offset-1">
	            @include('admin.global-partials.messages')
	          </div>
	        </div> 
	        @include('admin.role.partials.search')
	        <p></p>
	          <div class="col-lg-7">
	            <section class="panel">
	              <header class="panel-heading">Roles</header>
	               @include('admin.role.partials.table')
	            </section>
	            Hay {{$roles->total()}} registros
	            <div class="pull-right">
	               <div class="dataTables_paginate paging_bootstrap">
	                   {!!$roles->render()!!}
	                </div>
	            </div>
	          </div> 
	       </div>
       @else
         @include('admin.global-partials.perm-access-denied')
   @endcan    
</section>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    @include('admin.role.partials.delete-popup')
</div>