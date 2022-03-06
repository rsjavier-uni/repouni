 @include('admin.global-partials.header')
  <body class="login-img3-body">
    <div class="container">
      {!! Form::model(isset($usuario)?$usuario:'',array('route' => ['auth.login'], 'class' =>'login-form form-validate form-horizontal', 'id'=>'login-form', 'method' =>'post')) !!}        
        <div class="login-wrap">
             @include('admin.global-partials.messages')
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group form-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
               {!! Form::text('username',null, ['placeholder'=>'Username','class' => 'form-control','id'=>'inputUsername','maxlength'=>'25']) !!}
            </div>
            <div class="input-group form-group">
              <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                 {!! Form::password('password', ['placeholder'=>'Password','class' => 'form-control','id'=>'inputPassword','maxlength'=>'30']) !!}
            </div>
             {!! Form::submit('Ingresar', ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}
  </body>