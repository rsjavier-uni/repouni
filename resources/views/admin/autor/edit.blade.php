@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	@can('autor.edit') 
	    <div class="row">
	      <div class="col-lg-8">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Autor</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Autor Form</li>
	        </ol>
	      </div>
	     </div>
	       <div class="row">
	          <div class="col-lg-8">
	            <section class="panel">
	              <header class="panel-heading">Form Autor</header>
	              {!! Form::model($autor,array('route' => ['autor.update',$autor->id],'role' => 'form', 'id' => 'autorForm', 'class' =>'form-validate form-horizontal', 'method' =>'PUT')) !!}
	               @include('admin.autor.partials.fields')
	              {!! Form::close() !!}
	        </div> 
	        </div>
        @else
          @include('admin.global-partials.perm-access-denied')
     @endcan     
  </section>
</section>



