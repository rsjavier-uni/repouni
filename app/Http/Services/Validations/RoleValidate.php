<?php
namespace App\Http\Services\Validations;
use App\Models\role;
Class RoleValidate {
	public function __construct(){
	}
   public function unique($id,$value){
   	 $role=new Role();
	 $role = $role->where('name',$value)->first();
     if ($role) {
         if ($id!=""){
            $role=$role->findOrFail($id);
           	if ($value==$role->name){
           	   	 return true;
           	 }
           	   	 
          }
               return false;
           }else{
                return true;
           }  
      }  
}
