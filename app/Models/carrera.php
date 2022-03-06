<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Carrera extends Model implements AuditableContract{
    use Auditable;
    protected $table='carrera';
    protected $fillable = ['facultad_id','carrera'];
	protected $auditExclude = ['id'];
	public function facultad() {
        return $this->belongsTo('App\Models\facultad', 'facultad_id');
    }
    public function investigaciones() {
        return $this->hasMany('App\Models\libroinvestigacioncarrera','carrera_id');
    }

}