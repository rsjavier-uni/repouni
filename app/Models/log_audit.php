<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Log_Audit extends Model{
   protected $table='audits';
   protected $fillable = ['user_id','event','auditable_id','auditable_type','old_values','new_values','url','ip_address','created_at'];
   public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
   }
}
