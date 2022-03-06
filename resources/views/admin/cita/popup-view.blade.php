
<div class="modal-content col-md-7 col-lg-offset-3">
    <div class="modal-header">
        {!! Form::button('<span class="icon_close_alt2" aria-hidden="true">', ['class' => 'close','data-dismiss'=>'modal','aria-hidden'=>'true']) !!}
        <h4 class="modal-title custom_align" id="Heading">Agregar Cita</h4>
    </div>
    <div class="modal-body">
       <div id="message-success-cita" class="col-sm-7 col-lg-offset-2"></div>
       <div class="row">
          <div class="col-lg-12">
              <section class="panel">
                 <header class="panel-heading">Indice Form</header>
                    {!! Form::open(array('role' => 'form', 'id' => 'citaForm', 'class' =>'form-validate form-horizontal')) !!}
                        @include('admin.cita.partials.fields')
                    {!! Form::close() !!}
                       @include('admin.cita.index')
               </section>
           </div> 
         </div>
     </div>
</div>







               



