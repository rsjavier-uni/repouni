<div class="panel-body">
    <div class="form">
        <div class="form-group">
        {!! Form::hidden('id',null, array('id' => 'role_id'))	!!}
          {!! Form::label('role','Rol: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('name',null, ['placeholder'=>'Rol','id'=>'name','class' => 'form-control','maxlength' =>'40','oninput'=>'generateSlugInput();']) !!}
           </div>
           {!! Form::label('slug','Slug: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('slug',null, ['id'=>'slug','placeholder'=>'Slug','class' => 'form-control','maxlength' =>'40','readonly'=>true]) !!}
           </div>
        </div>
        <div class="form-group">
           <div class="col-lg-offset-5">
              {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
              {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
           </div>
        </div>
     </div>
</div>
 

