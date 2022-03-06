<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Role_User extends Model {
   protected $table='role_user';
   protected $fillable = ['user_id', 'role_id'];
   public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function role() {
        return $this->belongsTo('App\Models\role', 'role_id');
    }
}
