<div class="search">
  <div class="container">
	<div class="row">
        <div id="filter-panel-search-adv" class="filter-panel">
            <div class="col-md-12">
                <div class="form-section">
                    {!! Form::model(isset($libro_inv)?$libro_inv:'',array('route' => 'libroinv.advanced-search','role' => 'form', 'id' => 'advanceSearchForm', 'class' =>'form-horizontal', 'method'   =>'GET')) !!}
	                    <div class="panel-body">
	                        <div class="form">
	                              <div class="form-group">
							          {!! Form::label('mostrar','Mostrar: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
							          <div class="col-md-1">
							             {!! Form::select('mostrar', ['10'=>'10','15' => '15', '20' => '20','25'=>'25'], null,['class' => 'form-control']) !!}
							           </div>
							             {!! Form::label('palabra_clave','Palabra Clave: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
							           <div class="col-sm-4">
							             {!! Form::text('palabra_clave',null, ['placeholder'=>'Encuentre su Articulo de Investigación','class' => 'form-control']) !!}
							           </div>
									   <div class="col-sm-2">
							             {!!Form::radio('categoria', 'Titulo',true)!!}Titulo
							             {!!Form::radio('categoria', 'Area')!!}Area
							             {!!Form::radio('categoria', 'Autor')!!}Autor
							         </div>
	                                    {!! Form::label('orden','Orden: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
	                                 <div class="col-sm-2">
	                                    {!! Form::select('orden', ['asc'=>'Ascendente','desc' => 'Descendente'], null,['class' => 'form-control']) !!}                              
	                                 </div>
		                          </div>
		                          <div class="form-group">
		                          	{!! Form::label('tipo','Tipo: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
							          <div class="col-sm-2">
							             {!! Form::select('tipo', ['TFG'=>'Trabajo Final de Grado','Post Grado' => 'Postgrado', 'Investigación' => 'Investigaciones'], null,['class' => 'form-control']) !!}
							          </div>
							        {!! Form::label('por-año','Desde: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
							          <div class="col-sm-1">
							             {!! Form::select('año_desde',$libro_inv_years,null, ['class' => 'form-control','id'=>'selectAñoDesde']) !!}
							          </div>
							          {!! Form::label('por-año','Hasta: ',['class'=>'pull-left control-label','for'=>'textinput']) !!}
							          <div class="col-sm-1">
							              {!! Form::select('año_hasta',$libro_inv_years,null, ['class' => 'form-control','id'=>'selectAñoHasta']) !!}
							          </div>
							          
							          <div class="pull-left">
		                          	     {!! Form::button('<span class="glyphicon glyphicon-search"></span> Buscar', ['class' => 'btn btn-primary','type'=>'submit']) !!}
		                               </div>
		                          </div>
	                         </div>
	                      </div>
	                {!! Form::close() !!}   
                   </div>
                </div>
            </div>
        </div>
	</div>
  </div>