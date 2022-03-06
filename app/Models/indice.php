<?php

namespace App\Models;
use OwenIt\Auditing\Auditable;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\Model;

Class Indice extends Model implements AuditableContract{
   use Auditable;
   protected $table='indice';
   protected $fillable = ['indice', 'libro_inv_id','pagina'];
   protected $auditExclude = ['id','libro_inv_id'];
   public function libroInvestigacion() {
        return $this->belongsTo('App\Models\libroinvestigacion', 'libro_inv_id');
   }
   public function transformAudit(array $data){
		  if (Arr::has($data,'new_values.libro_inv_id')) {
            Arr::set($data, 'new_values.Titulo',$this->libroInvestigacion->titulo);
        }
        return $data;
    }
}
