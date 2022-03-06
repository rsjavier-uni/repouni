<div class="panel-body">
    <div class="form">
        <div class="form-group">
          {!!Form::hidden('usuario_id', isset($usuario->id)?$usuario->id:"",['id'=>'txt_usuario_id']) !!}
          {!! Form::label('username','Username: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
             {!! Form::text('username',null, ['placeholder'=>'Username','class' => 'form-control','maxlength' =>'25']) !!}
           </div>
              {!! Form::label('password','Password: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
           <div class="col-sm-4">
              {!! Form::password('password', ['placeholder'=>'Password','class' => 'form-control','id'=>'txt_password','maxlength' =>'25']) !!}
               <i class="glyphicon glyphicon-eye-open" title="new"></i>&nbsp {!! link_to('#','Mostrar',[ 'onClick'=>'showPassword();','data-toggle'=>'modal']) !!}
            </div>
        </div>
        <div class="form-group">
          {!! Form::label('password_confirmation','Password Confirmation: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
              {!! Form::password('password_confirmation', ['placeholder'=>'Password Confirmation','class' => 'form-control','id'=>'txt_password_conf','maxlength' =>'25']) !!}
          </div>
           {!! Form::label('Rol','Rol: ',['class'=>'col-sm-2 control-label','for'=>'textinput']) !!}
          <div class="col-sm-4">
              @role('super-usuario')
                {!! Form::select('role',$roles,null, ['class' => 'form-control','id'=>'slcRole']) !!}
                @else
                {!! Form::select('role',$roles,null, ['class' => 'form-control','id'=>'slcRole','disabled'=>'disabled']) !!}
              @endrole 
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
 

