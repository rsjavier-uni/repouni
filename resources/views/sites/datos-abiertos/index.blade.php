<html>
    @include('sites.global-partials.header')
    @include('sites.global-partials.menu') 
    <p></p>
    <div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Investigaciones - Datos Abiertos Para La Ciencia
            </h1>
        </div>
    </div>

    <!-- search section -->
    @include('sites.datos-abiertos.partials.advanced-search') 
    <h2 class="page-header">Articulos de Investigaciones</h2>
    @include('sites.datos-abiertos.partials.lista_de_investigaciones')
</html>