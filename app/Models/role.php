<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
Class Role extends Model implements AuditableContract{
   use Auditable; 
   protected $table='roles';
   protected $fillable = ['name', 'slug'];
   protected $auditExclude = ['id'];
   public function roles(){
   	 return $this->hasMany('App\Models\role_user','role_id');
   }
   public function users(){
   	 return $this->hasMany('App\Models\User','id');
   }
   public function permissions(){
   	 return $this->hasMany('App\Models\permission_role','role_id');
   }
}
