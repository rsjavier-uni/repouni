 <table class="table table-striped table-condensed">
     <thead>
       <tr>
         <th>Fecha</th>        
         <th>Usuario</th>
         <th>Entidad</th>
         <th>Datos Antiguos</th>
         <th>Datos Nuevos</th>
         <th>Acción</th>                                   
       </tr>
     </thead>   
     <tbody>
         @foreach ($logs_audits as $log_audit)
           <tr>
              <td>{{$log_audit->created_at}}</td> 
              <td>{{$log_audit->user->username}}</td>
              <td>{{$log_audit->auditable_type}}</td>
              <td>{{$log_audit->old_values}}</td>
              <td>{{$log_audit->new_values}}</td>
              <td><span class="label {{(strcmp($log_audit->event,"created")===0)?'label-warning':(strcmp($log_audit->event,"updated")===0)?'label-success':'label-danger'}}">{{$log_audit->event}}</span>
              </td>                                    
           </tr>  
         @endforeach              
      </tbody>
 </table>