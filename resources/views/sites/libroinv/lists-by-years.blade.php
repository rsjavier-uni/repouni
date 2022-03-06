<html>
 @include('sites.global-partials.header')
 @include('sites.global-partials.menu')
 <div class="container">
 	<div class="row">
 		<h3 class="page-header">Buscar</h3>
 		<div class="search">
	 		<div class="form-section">
	 			<div class="panel-body"> 
			 	  {!! Form::label('por-año','Año: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
			 	  <div class="col-sm-1">
			 	  	{!! Form::select('año',$libro_inv_years,$year, ['class' => 'form-control pull-right','id'=>'slc_año']) !!}
		          </div>
		          <div class="col-lg-offset-1">
		             {!! Form::button('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-primary','onclick'=>'searchLibroInvByYear();']) !!}
		          </div>
		       </div>
		    </div>
		 </div>
	 	<h3 class="page-header">Registros Obtenidos </h3>
	    @include('sites.libroinv.partials.lists-lib-inv')
	    @include('sites.global-partials.footer')
	 </div>
  </div>
</html> 