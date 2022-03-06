@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	@can('logs.audits')
	    <div class="row">
	      <div class="col-lg-12">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Log de Auditoria</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Log de Auditoria</li>
	        </ol>
	      </div>
	    </div>
	     @include('admin.logs-audits.partials.search')
	      <div class="row">
	          <div class="col-lg-12">
	             <section class="panel">
	               <div class="container">
	                   @include('admin.logs-audits.partials.table')
	               </div>
	            </section>
	              Hay {{$logs_audits->total()}} registros
	            <div class="pull-right">
	               <div class="dataTables_paginate paging_bootstrap">
	                  {!!$logs_audits->render()!!}
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
       @include('admin.logs-audits.partials.delete-popup')
</div> 