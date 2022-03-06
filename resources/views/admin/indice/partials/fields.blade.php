<div class="panel-body">
    <div class="form">
        <div class="form-group">
          {!! Form::token('token',"",['id'=>'txt_indice_token']) !!} 
          {!!Form::hidden('indice_id',"",['id'=>'txt_indice_id']) !!}
          {!! Form::label('indice','Indice: ',['class'=>'col-sm-1 control-label','for'=>'textinput']) !!}
          <div class="col-sm-6">
             {!! Form::text('indice',null, ['placeholder'=>'Indice','class' => 'form-control','maxlength' =>'60','id'=>'txt_indice']) !!}
           </div>
          	{!! Form::label('pagina','Pág: ',['class'=>'col-sm-1 control-label','for'=>'textinput']) !!}
            <div class="col-sm-3">
             {!! Form::text('pagina',null, ['placeholder'=>'Pág','class' => 'form-control','maxlength' =>'3','id'=>'txt_pag','style'=>'width:40%;']) !!}
            </div>
         </div>
            <div class="form-group">
	           <div class="col-sm-2  pull-right">
	               {!! Form::submit('Agregar', ['class' => 'btn btn-primary','id'=>'btnAddIndice']) !!}
	           </div>
	        </div>
     </div>
</div>

 



