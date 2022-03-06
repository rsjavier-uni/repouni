 <html>
  @include('sites.global-partials.header')
  @include('sites.global-partials.menu') 
  </br>
 <div class="container-fluid">
    <section class="container">
		<div class="container-page">
			<div class="col-md-6 col-lg-offset-3">
                  @include('admin.global-partials.messages')
            </div>
            <div class="col-md-8 col-lg-offset-2">
                {!! Form::model($user,array('route' => ['webSiteUser.update'],'role' => 'form', 'id' => 'userWebSiteForm', 'class' =>'form-validate form-horizontal', 'method' =>'PUT')) !!}   
                   <fieldset>
                       <legend>Datos del Usuario</legend>
                           @include('sites.other-pages.user.partials.fields')
                    </fieldset>
                 {!! Form::close() !!}
             </div>
       </div>
    </section>
   </div> 
 <div class="container container-pad"> 
 	@include('sites.global-partials.footer-widget')
 </div>
 
 @include('sites.global-partials.footer')
</html>