@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
	<section id="main-content">
	  <section class="wrapper">
	  	  @can('area.edit')
		    <div class="row">
		      <div class="col-lg-7">
		        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Area</h3>
		        <ol class="breadcrumb">
		          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
		          <li><i class="icon_document_alt"></i>Area Form</li>
		        </ol>
		      </div>
		     </div>
		     <div class="row">
		         <div class="col-lg-7">
		            <section class="panel">
		              <header class="panel-heading">Form Area</header>
		              {!! Form::model($area,array('route' => ['area.update',$area->id],'role' => 'form', 'id' => 'areaForm', 'class' =>'form-validate form-horizontal', 'method' =>'PUT')) !!}
		               @include('admin.area.partials.fields')
		              {!! Form::close() !!}
		        </div> 
		    </div>
		   @else
             @include('admin.global-partials.perm-access-denied')
        @endcan
	  </section>
	</section>
  


