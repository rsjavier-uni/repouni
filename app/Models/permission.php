<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Permission extends Model{
   protected $table='permissions';
   protected $fillable = ['name', 'slug'];
   public function permissions(){
   	 return $this->hasMany('App\Models\permission_role','permission_id');
   }
}