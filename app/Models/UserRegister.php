<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRegister extends Authenticatable implements AuditableContract{
    use Notifiable;
	 use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $auditExclude = ['password','id'];
    protected $table='users_register';
    protected $fillable = ['nombre','apellido','email','organizacion','ocupacion','username', 'password' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
