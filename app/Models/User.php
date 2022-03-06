<?php

namespace App\Models;
use Illuminate\Support\Arr;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class User extends Authenticatable implements AuditableContract{
    use Notifiable;
    use ShinobiTrait;
    use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = ['username', 'password','role_id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $auditExclude = ['remember_token','password','id','role_id'];
	public function role() {
        return $this->belongsTo('App\Models\role', 'role_id');
    }
	public function audits(){
        return $this->hasMany('App\Models\log_audit','user_id');
    }
	public function transformAudit(array $data){
		Arr::set($data, 'new_values.Rol',$this->role->name);
        return $data;
    }
}
