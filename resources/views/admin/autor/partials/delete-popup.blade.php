<div class="modal-content col-md-5 col-lg-offset-3">
    <div class="modal-header">
        {!! Form::button('<span class="icon_close_alt2" aria-hidden="true">', ['class' => 'close','data-dismiss'=>'modal','aria-hidden'=>'true']) !!}
        <h4 class="modal-title custom_align" id="Heading">Eliminar Autor</h4>
    </div>
    {!! Form::open(array('route' => ['autor.destroy',':autor_ID'], 'id' => 'form-delete', 'class' =>'form-horizontal', 'method' =>'DELETE')) !!}
    <div class="modal-body">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Desea Eliminar el Autor <span id="autor">/</span></div>
    </div>
    <div class="modal-footer ">
       {!! Form::button('<span class="icon_check_alt2"></span> Si', ['class' => 'btn btn-success','type'=>'submit']) !!}
       {!! Form::button('<span class="icon_close_alt2"></span> No', ['class' => 'btn btn-default ','data-dismiss'=>'modal']) !!}
    </div>    
     {!! Form::close() !!}
</div>