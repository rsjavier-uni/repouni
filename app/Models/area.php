<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
Class Area extends Model implements AuditableContract{
   use Auditable;
   protected $table='area';
   protected $fillable = ['area'];
   protected $auditExclude = ['id'];
   public function investigaciones(){
        return $this->hasMany('App\Models\libroinvestigacion','id');
   } 
}

