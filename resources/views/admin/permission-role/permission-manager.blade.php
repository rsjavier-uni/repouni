@include('admin.global-partials.header')
@include('admin.global-partials.header-top')
@include('admin.global-partials.menu')
@can('permission.manager')
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
         {!! Form::open(array('route' => 'permission.update','role' => 'form', 'id' => 'permissionForm', 'class' =>'form-horizontal', 'method'   =>'POST')) !!}
          <div class="col-md-8">
            <h4 class="page-header"><i class="fa fa-files-o"></i>Administración de Permisos de Usuarios</h4>
              <div class="col-lg-offset-5">
              	 @include('admin.global-partials.messages')
              </div>
              @include('admin.permission-role.partials.fields')
          </div>
           <div class="col-md-1"> {!! Form::button('<i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i>', ['class' => 'btn btn-primary btn-fixed','type'=>'submit','title'=>'Guardar']) !!}</div>
        {!! Form::close() !!}
        </div>
       </section> 
     </section> 
  @else
     @include('admin.global-partials.perm-access-denied')
@endcan    