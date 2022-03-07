@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')

<section id="main-content">
    <section class="wrapper">
  	    @can('datos-abiertos.new') 
	        <div class="row">
            <div class="col-lg-10">
                <h3 class="page-header"><i class="fa fa-files-o"></i>Nueva Investigación de Postgrado - Datos Abiertos para la Ciencia</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
                    <li><i class="icon_document_alt"></i>Nueva Investigación</li>
                </ol>
            </div>
	        </div>
	        <div class="row">
                <div class="col-lg-10">
                    <section class="panel">
                    <header class="panel-heading">Formulario</header>
                    {!! Form::open(array('route' => 'datos-abiertos.create','role' => 'form', 'id' => 'investigacionDAForm', 'class' =>'form-validate form-horizontal', 'method'   =>'POST','files'=>true)) !!}
                        <div class="panel-body">
                            @include('admin.datos-abiertos.partials.fields')
                        </div>
                    {!! Form::close() !!}
                </div> 
	        </div>
       @else
            @include('admin.global-partials.perm-access-denied')
        @endcan    
    </section>
</section>
