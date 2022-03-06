 <html>
 @include('sites.global-partials.header')
  @include('sites.global-partials.menu')
  </br></br>
  <div class="col-md-2 col-lg-offset-2">
  	{!! HTML::image(asset('assets/images/somos-img.png'),'img',['class'=>'img-responsive pull-right','alt'=>'image','style'=>'width: 50%;'])!!}
  </div>
  <div class="col-sm-6">
  	 <p>El Repositorio Institucional de la Universidad Nacional de Itapúa es una ventana para que los académicos, estudiantes y docentes de la Institución puedan dar mayor visibilidad a la producción intelectual, científica y docente, aumentando su impacto en la sociedad y asegurar la preservación de la misma.</p>
  </div> 

 <div class="container container-pad"> 
 	@include('sites.global-partials.footer-widget')
 </div>
 
 @include('sites.global-partials.footer')
 </html>