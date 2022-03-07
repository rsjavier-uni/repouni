<html>
    @include('sites.global-partials.header')
    @include('sites.global-partials.menu')
    <div class="container">
        <div class="row">
            <h2 class="page-header">Búsqueda</h2>
            @include('sites.datos-abiertos.partials.advanced-search')
            <h3 class="page-header">Resultados de la búsqueda: {{$investigacion_lists->currentPage()*$investigacion_lists->currentPage()}} a {{$investigacion_lists->count()*$investigacion_lists->currentPage()+1}} de {{$count_all}} </h3>
            @include('sites.datos-abiertos.partials.lista_de_investigaciones')
        </div>
    </div>
</html> 