 @php ($i=0)
 @foreach ($roles as $role)
        <div class="panel-group col-lg-offset-5" id="accordion-cat-1">
          <div class="panel panel-default panel-faq">
             <div class="panel-heading">
               <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-{{$role->id}}">
                 <h4 class="panel-title">{{utf8_decode($role->name)}}
                   <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                 </h4>
              </a>
            </div>
           <div id="faq-cat-1-sub-{{$role->id}}" class="panel-collapse collapse">
              <div class="card-block p-0">
                <table class="table">
                  <tbody>
                    @foreach ($permissions as $perm)
                       @php ($i=$i+1)
                       <tr>
                          <td>
                              <label class="custom-control custom-checkbox">
                                @php ($actOrinac=($perm_role->where('permission_id',$perm->id)->where('role_id',$role->id)->count()>0)?true:false)
                                {!! Form::checkbox('permissions[]',$perm->id.' '.$role->id,$actOrinac, ['id'=>"chk$i",'class' => 'custom-control-input']) !!}  
                                <span class="custom-control-indicator"></span>
                              </label>
                           </td>
                           <td>{{utf8_decode($perm->name)}}</td>
                        </tr>
                     @endforeach
                   </tbody>
                </table>
            </div>
         </div>
        </div>
     </div>
 @endforeach