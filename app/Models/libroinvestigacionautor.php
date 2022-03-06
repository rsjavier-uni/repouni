<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
Class LibroInvestigacionAutor extends Model implements AuditableContract{
   use Auditable; 
   protected $table='libro_investigacion_autor';
   protected $fillable = ['autor_id', 'libro_inv_id'];
    protected $auditExclude = ['id'];
   public function autor() {
        return $this->belongsTo('App\Models\autor', 'autor_id');
    }
    public function libroInvestigacion() {
        return $this->belongsTo('App\Models\libroinvestigacion', 'libro_inv_id');
    }
	public function transformAudit(array $data){
        if (Arr::has($data,'new_values.autor_id')) {
            Arr::set($data, 'new_values.Autor',$this->autor->nombre.' '.$this->autor->apellido);
        }
		  if (Arr::has($data,'new_values.libro_inv_id')) {
            Arr::set($data, 'new_values.Titulo',$this->libroInvestigacion->titulo);
        }
        return $data;
    }
}
