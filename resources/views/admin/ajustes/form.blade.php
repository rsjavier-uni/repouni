@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-9">
        <h3 class="page-header"><i class="fa fa-files-o"></i>Form Ajustes</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i>{!!link_to('admin','Home') !!}</li>
          <li><i class="icon_document_alt"></i>Ajustes Form</li>
        </ol>
      </div>
     </div>
   @can('ajustes.update')
        <div class="row">
          <div class="col-md-5 col-lg-offset-2">
            @include('admin.global-partials.messages')
          </div>
          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">Form Ajustes</header>
               {!! Form::model($ajustes,array('route' => ['ajustes.update',$ajustes->id],'role' => 'form', 'id' => 'ajustesForm', 'class' =>'form-validate form-horizontal', 'method' =>'PUT','files'=>true)) !!}
                  @include('admin.ajustes.partials.fields')
              {!! Form::close() !!}
          </div> 
       </ div>
      @else
       <div class="alert alert-danger col-md-9">
           <ul>
                <li>No posee permiso para acceder a estra página</li>
           </ul>
        </div>
    @endcan
 </section>
</section>

               

