<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
Class Cita extends Model implements AuditableContract{
   use Auditable;
   protected $table='cita';
   protected $fillable = ['cita', 'libro_inv_id'];
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
