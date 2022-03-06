<?php

namespace App\Http\Controllers\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ArrayService;
use App\Models\role_user;
class RoleUserController extends Controller{
     public function __construct(){
    }

    public  function create($user_id,$role_id){
         $role_user = new Role_User();
         $role_user->user_id=$user_id;
         $role_user->role_id=$role_id;
         $role_user->save();
    }
    public function update($id,$user_id,$role_id){
          $role_user=new Role_User();
          $role_user=$role_user->findOrFail($id);
          $role_user->user_id=$user_id;
          $role_user->role_id=$role_id;
          $role_user->update(); 
    }
    public function destroy($id){
        $role_user=new Role_User();
        $role_user=$role_user->findOrFail($id);
        $role_user->delete();
    }
  
}
