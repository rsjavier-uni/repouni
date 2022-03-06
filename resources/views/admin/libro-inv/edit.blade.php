@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	@can('libroinv.edit') 
	    <div class="row">
	      <div class="col-lg-10">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Investigaci�n</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Investigaci�n Form</li>
	        </ol>
	      </div>
	     </div>
	        <div class="row">
	          <div class="col-lg-10">
	            <section class="panel">
	              <header class="panel-heading">Form Investigaci�n</header>
	              {!! Form::model($libroinv,array('route' => ['libroinv.update',$libroinv->id],'role' => 'form', 'id' => 'investigacionForm', 'class' =>'form-validate form-horizontal', 'method' =>'PUT','files'=>true)) !!}
	                 <div class="panel-body">
	                    @include('admin.libro-inv.partials.fields')
	                    @include('admin.libro-inv.partials.buttons')
	                 </div>
	              {!! Form::close() !!}
	          </div> 
	       </div>
       @else
       @include('admin.global-partials.perm-access-denied')
    @endcan   
 </section>
</section>
<div class="modal fade" id="open-popup" tabindex="-1" role="dialog" aria-labelledby="open" aria-hidden="true">
       @include('admin.indice.popup-view')
</div>
<div class="modal fade" id="open-popup-cita" tabindex="-1" role="dialog" aria-labelledby="open" aria-hidden="true">
       @include('admin.cita.popup-view')
</div>

