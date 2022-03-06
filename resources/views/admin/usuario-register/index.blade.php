@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	 @can('usuario.index')
	    <div class="row">
	      <div class="col-lg-9">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Lista de Usuario</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Lista de Usuarios</li>
	        </ol>
	      </div>
	     </div>
	     <div class="row">
	         <div class="col-md-11">
	           <div class="col-md-6 col-lg-offset-2">
	            @include('admin.global-partials.messages')
	           </div>
	          </div> 
	          @include('admin.usuario-register.partials.search')
	          <div class="col-lg-9">
	            <section class="panel">
	              <header class="panel-heading">Usuarios</header>
	               @include('admin.usuario-register.partials.table')
	            </section>
	            Hay {{$usuarios_regs->total()}} registros
	            <div class="pull-right">
	               <div class="dataTables_paginate paging_bootstrap">
	                 {!!$usuarios_regs->render()!!}
	               </div>
	            </div>
	          </div> 
	     </div>
       @else
          @include('admin.global-partials.perm-access-denied')
    @endcan    
</section>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
       @include('admin.usuario-register.partials.delete-popup')
</div>