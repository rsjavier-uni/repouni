<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
Class Permission_Role extends Model implements AuditableContract{
   use Auditable; 
   protected $table='permission_role';
   protected $fillable = ['permission_id', 'role_id'];
   protected $auditExclude = ['permission_id','id','role_id'];
   public function permission() {
        return $this->belongsTo('App\Models\permission', 'permission_id');
    }
    public function role() {
        return $this->belongsTo('App\Models\role', 'role_id');
    }
    public function transformAudit(array $data){
        Arr::set($data, 'new_values.Permiso',$this->permission->name);
        Arr::set($data, 'new_values.Rol',$this->role->name);
        return $data;
    }
}
