 <html>
  @include('sites.global-partials.header')
  @include('sites.global-partials.menu') 
  </br>
 <div class="container-fluid">
    <section class="container">
		<div class="container-page">
			<div class="col-md-6 col-lg-offset-1">
                  @include('admin.global-partials.messages')
            </div>
            <div class="col-md-8">
                {!! Form::open(array('route' => 'registration.send','role' => 'form', 'id' => 'registrationForm', 'class' =>'form-validate form-horizontal', 'method'   =>'POST')) !!}
                   <fieldset>
                       <legend>Formulario para solicitud de registro</legend>
                           @include('sites.other-pages.registration.partials.fields')
                    </fieldset>
                 {!! Form::close() !!}
             </div>
              <div class="col-md-3 col-md-offset-1">
				 <h3 class="dark-grey">Términos y Condiciones</h3>
				<p>Una ves enviada la Solicitud de Registro en los próximos días se le enviará a su dirección de correo electrónico los datos de su usuario y contraseña</p>
			  </div>
       </div>
    </section>
   </div> 
 <div class="container container-pad"> 
 	@include('sites.global-partials.footer-widget')
 </div>
 
 @include('sites.global-partials.footer')
</html>