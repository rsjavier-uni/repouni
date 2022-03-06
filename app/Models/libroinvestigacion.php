<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
Class LibroInvestigacion extends Model implements AuditableContract{
   use Auditable; 
   protected $table='libro_investigacion';
   protected $fillable = ['id','cod_doi','titulo', 'area_id','año','descripcion','portada_name','document_name','path_portada','path_document','idioma','categoria','created_at'];
   protected $auditExclude = ['id','area_id','updated_at'];
   public function invautores() {
        return $this->hasMany('App\Models\libroinvestigacionautor','libro_inv_id');
    }
   public function invcarreras(){
        return $this->hasMany('App\Models\libroinvestigacioncarrera','libro_inv_id');
    }
   public function indices(){
        return $this->hasMany('App\Models\indice','libro_inv_id');
    } 
   public function citas(){
        return $this->hasMany('App\Models\cita','libro_inv_id');
    } 
   public function area() {
        return $this->belongsTo('App\Models\area', 'area_id');
    }
   public function transformAudit(array $data){
        if (Arr::has($data,'new_values.area_id')) {
            Arr::set($data, 'new_values.area',  $this->area->area);
        }
        return $data;
    }
}
