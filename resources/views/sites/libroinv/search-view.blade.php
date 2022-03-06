<html>
 @include('sites.global-partials.header')
 @include('sites.global-partials.menu')
 <div class="container">
 	<div class="row">
	 	<h2 class="page-header">Búsqueda</h2>
	 	@include('sites.libroinv.partials.advanced-search')
	 	<h3 class="page-header">Resultados de la búsqueda: {{$libro_inv_lists->currentPage()*$libro_inv_lists->currentPage()}} a {{$libro_inv_lists->count()*$libro_inv_lists->currentPage()+1}} de {{$count_all}} </h3>
	    @include('sites.libroinv.partials.lists-lib-inv')
	    @include('sites.global-partials.footer')
	 </div>
  </div>
</html> 