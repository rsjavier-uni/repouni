            <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Bienvenidos al Repositorio Virtual de la UNI
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Bienvenidos</h4>
                    </div>
                    <div class="panel-body">
                        <p>El Repositorio Institucional de la Universidad Nacional de Itapúa es una ventana para que los académicos, estudiantes y docentes de la Institución puedan dar mayor visibilidad a la producción intelectual, científica y docente, aumentando su impacto en la sociedad y asegurar la preservación  de la misma.</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Facultades</h4>
                    </div>
                    <div class="panel-body">
                         @foreach ($facultades as $facultad)
                         	<li>{!! link_to($facultad->web,'Facultad de '.$facultad->facultad,array('target' => '_blank')) !!}
                   </li>
                         @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Por Año</h4>
                    </div>
                    <div class="panel-body">
                    	<div class="bot-links">
                          @foreach ($libro_inv_years as $year)
                        	{!! link_to_route('libroinv.lists-by-year',$year, [$year]) !!}
                          @endforeach
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- search section -->
         <h2 class="page-header">Búsqueda</h2>
        @include('sites.libroinv.partials.advanced-search') 
        <h2 class="page-header">Articulos de Investigaciones</h2>
        @include('sites.libroinv.partials.lists-lib-inv')
       @include('sites.global-partials.footer-widget')

    </div>