@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
  	 @can('usuario.edit')
        @if ($usuario->id==Auth::user()->id||Auth::user()->isRole('super-usuario'))
		    <div class="row">
		      <div class="col-lg-8">
		        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Usuario</h3>
		        <ol class="breadcrumb">
		          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
		          <li><i class="icon_document_alt"></i>Usuario Form</li>
		        </ol>
		      </div>
		     </div>
		        <div class="row">
		          <div class="col-lg-8">
		            <section class="panel">
		              <header class="panel-heading">Form Usuario</header>
		              {!! Form::model($usuario,array('route' => ['usuario.update',$usuario->id],'role' => 'form', 'id' => 'usuarioForm', 'class' =>'form-validate form-horizontal', 'method' =>'PUT')) !!}
		               @include('admin.usuario.partials.fields')
		              {!! Form::close() !!}
		          </div> 
		       </div>
            @else
               @include('admin.global-partials.perm-access-denied')
         @endif
         @else
             @include('admin.global-partials.perm-access-denied')
      @endcan    
  </section>
</section>



