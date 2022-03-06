@include('sites.global-partials.header')
@include('sites.global-partials.menu') 
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h3 class="h3">Formulario de contacto</h3>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                {!! Form::open(array('route' => 'contactForm.send','role' => 'form', 'id' => 'contactForm', 'class' =>'form-validate', 'method'   =>'POST')) !!}
                <div class="row">
                   <div class="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('nombre','Nombre y Apellido (*): ',['class'=>'control-label','for'=>'textinput']) !!}  
                            {!! Form::text('nombre',null, ['placeholder'=>'Nombre y Apellido','class' => 'form-control','maxlength' =>'25']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('email','Email (*): ',['class'=>'control-label','for'=>'textinput']) !!}
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>{!! Form::text('email',null, ['placeholder'=>'Email','class' => 'form-control','maxlength' =>'40']) !!}
                            </div>      
                        </div>
                        <div class="form-group">
                            {!! Form::label('asunto','Asunto (*): ',['class'=>'control-label','for'=>'textinput']) !!}
                            {!! Form::text('asunto',null, ['placeholder'=>'Asunto','class' => 'form-control','maxlength' =>'25']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                           {!! Form::label('mensaje','Mensaje (*): ',['class'=>'control-label','for'=>'textinput']) !!}
                           {!! Form::textarea('mensaje', null, ['placeholder'=>'Mensaje','class' => 'form-control','rows' => '9', 'cols' => '25']) !!}
                        </div>
                    </div>
                    <div class="col-md-12 pull-rigth">
                        {!! Form::submit('Enviar Mensaje', ['class' => 'btn btn-primary']) !!}
                    </div>
              
                </div>
               {!! Form::close() !!}
             </div>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Contacto</legend>
            <address>
                <strong>Dirección</strong><br>
                Calle Abog. Lorenzo Zacarias Nº 255  <br>
                c/ Ruta Nº 1 Km 2.5,<br>
                Encarnación, Itapúa
            </address>
            <address>
                <strong>Email</strong><br>
               {{$ajustes->mail_to}}
            </address>
            </form>
        </div>
    </div>
</div>
<div class="container container-pad"> 
 	@include('sites.global-partials.footer-widget')
 </div>
@include('sites.global-partials.footer')
