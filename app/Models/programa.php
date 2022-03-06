<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

Class Programa extends Model implements AuditableContract{
    use Auditable;
    protected $table='programa_acreditados';
    protected $fillable = ['anho_acreditacion', 'titulo', 'descripcion'];
    protected $auditExclude = ['id'];
    /*public function investigaciones(){
            return $this->hasMany('App\Models\libroinvestigacion','id');
    } */
}