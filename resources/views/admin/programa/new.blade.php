@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')

<section id="main-content">
    <section class="wrapper">
	    @can('programa.new')
		    <div class="row">
		        <div class="col-lg-7">
		            <h3 class="page-header"><i class="fa fa-files-o"></i>Programa Acreditado por la ANEAES</h3>
		            <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
                        <li><i class="icon_document_alt"></i>Nuevo Programa Acreditado</li>
		            </ol>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-lg-7">
		            <section class="panel">
		                <header class="panel-heading">Formulario</header>
		                {!! Form::open(array('route' => 'programa.create','role' => 'form', 'id' => 'programaForm', 'class' =>'form-validate form-horizontal', 'method'   =>'POST')) !!}
		                	@include('admin.programa.partials.fields')
		              	{!! Form::close() !!}
                    </section>        
		        </div> 
		    </div>
	    @else
	        @include('admin.global-partials.perm-access-denied')
        @endcan
    </section>
</section>
