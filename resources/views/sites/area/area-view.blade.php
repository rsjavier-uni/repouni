<html>
 @include('sites.global-partials.header')
 @include('sites.global-partials.menu')
 <div class="container">
 	<div class="row">
 		<h3 class="page-header">Buscar</h3>
 		<div class="search">
	 		<div class="form-section">
	 			<div class="panel-body">
	 			 {!! Form::model($area,array('route' => ['sites.area',$area->id],'role' => 'form', 'id' => 'areaSearchForm', 'class' =>'form-validate form-horizontal')) !!}
			 	     {!! Form::label('por-area','Area: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
			 	     <div class="col-sm-2">
		                {!! Form::select('area_id',$areas_collect,null,['class' => 'form-control','id'=>'slt_area']) !!}
		            </div>
		             <div class="col-lg-offset-2">
		                {!! Form::button('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-primary','onclick'=>'searchLibroInvByArea();']) !!}
		             </div>
		         {!! Form::close() !!}
		       </div>
		    </div>
		 </div>
	 	<h3 class="page-header">Registros Obtenidos </h3>
	    @include('sites.libroinv.partials.lists-lib-inv')
	    <div class="container container-pad"> 
 	      @include('sites.global-partials.footer-widget')
        </div>
	    @include('sites.global-partials.footer')
	 </div>
  </div>
</html> 