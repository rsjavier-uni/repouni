<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Autor extends Model implements AuditableContract{
    use Auditable;
    protected $table='autor';
    protected $fillable = ['nombre', 'apellido','direccion','telefono','email'];
	protected $auditExclude = ['id'];
    public function getFullNameAttribute(){
      return $this->attributes['nombre'] . ' ' . $this->attributes['apellido'];
    }
    public function investigaciones() {
        return $this->hasMany('App\Models\libroinvestigacionautor','autor_id');
    }

}
