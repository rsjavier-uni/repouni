<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Facultad extends Model implements AuditableContract{
    use Auditable;
    protected $table='facultad';
    protected $fillable = ['facultad','web'];
    protected $auditExclude = ['id'];
	public function carreras() {
        return $this->hasMany('App\Models\carrera','facultad_id');
    }
}