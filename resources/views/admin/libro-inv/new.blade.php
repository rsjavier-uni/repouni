@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	@can('libroinv.new') 
	    <div class="row">
	      <div class="col-lg-10">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Investigación</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Investigación Form</li>
	        </ol>
	      </div>
	     </div>
	        <div class="row">
	          <div class="col-lg-10">
	            <section class="panel">
	              <header class="panel-heading">Form Investigación</header>
	              {!! Form::open(array('route' => 'libroinv.create','role' => 'form', 'id' => 'investigacionForm', 'class' =>'form-validate form-horizontal', 'method'   =>'POST','files'=>true)) !!}
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



               

