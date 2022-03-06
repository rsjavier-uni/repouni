@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	 @can('usuario.new')
	    <div class="row">
	      <div class="col-lg-9">
	        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Usuario</h3>
	        <ol class="breadcrumb">
	          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
	          <li><i class="icon_document_alt"></i>Usuario Form</li>
	        </ol>
	      </div>
	     </div>
	      <section class="panel col-lg-9">
		   <header class="panel-heading tab-bg-primary ">
		      <ul class="nav nav-tabs">
		         <li class="active">
		            <a data-toggle="tab" href="#admin-user">Usuario Administrador</a>
		         </li>
		         <li class="">
		            <a data-toggle="tab" href="#web-site-user">Usuario Sitio Web</a>
		         </li>
		      </ul>
		   </header>
		   <div class="panel-body">
		     <div class="tab-content">
		        <div id="admin-user" class="tab-pane active"> 
		           <div class="row">
			          <header class="panel-heading">Form Usuario</header>
			             {!! Form::open(array('route' => 'usuario.create','role' => 'form', 'id' => 'usuarioForm', 'class' =>'form-validate form-horizontal', 'method'   =>'POST')) !!}
			                @include('admin.usuario.partials.fields')
			             {!! Form::close() !!}
			       </div>   
		       </div>
		       <div id="web-site-user" class="tab-pane">
		          <div class="row">
			         <header class="panel-heading">Form Usuario</header>
			         {!! Form::open(array('route' => 'usuario-reg.create','role' => 'form', 'id' => 'usuarioRegisterForm', 'class' =>'form-validate form-horizontal', 'method'   =>'POST')) !!}
			             @include('admin.usuario-register.partials.fields')
			         {!! Form::close() !!}
			       </div>
		       </div>
		    </div>
		  </div>
		</section> 
       @else
          @include('admin.global-partials.perm-access-denied')
    @endcan  
  </section>
</section>



               

