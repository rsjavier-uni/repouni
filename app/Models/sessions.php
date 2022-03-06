<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Sessions extends Model{
   protected $table='sessions';
   public $timestamps = false;
   protected $fillable = ['user_id,ip_address,user_agent,in_session,last_activity'];
  
}

