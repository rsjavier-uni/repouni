<div class="row">
	<div id="message-success-login" class="col-sm-12"></div>
	
     <div class="form col-md-12">Login 
       {!! Form::open(array('role' => 'form', 'class' =>'form-validate form','id' => 'loginRegisterForm')) !!}
			<div class="form-group">
				{!! Form::label('username','Username',['class'=>'sr-only','for'=>'textinput']) !!}
			    {!! Form::text('username',null, ['placeholder'=>'Username','id'=>'txt_username','class' => 'required form-control','title'=>'El campo no puede estar vacio','maxlength' =>'25']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('password','Password',['class'=>'sr-only','for'=>'textinput']) !!}
				 {!! Form::password('password', ['placeholder'=>'Password','id'=>'txt_password','class' => 'required form-control','title'=>'El campo no puede estar vacio','maxlength'=>'30']) !!}
            </div>
	         <div class="form-group">
	           {!! Form::submit('Ingresar', ['class' => 'btn btn-primary','onClick'=>'checkLoginRegister();']) !!}
	         </div>
	    {!! Form::close() !!}
	  </div>
</div>