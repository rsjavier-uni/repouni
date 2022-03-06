<?php

namespace App\Http\Controllers\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajustes\AjustesController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ArrayService;
use App\Models\role;
use App\Models\permission;
use App\Models\permission_role;

class PermissionRoleController extends Controller{
     public function __construct(){
      $this->middleware(function ($request, $next) {
        if (Auth::check()){
          $this->current_usuario = Auth::user();
          $this->ajustes_cont=new AjustesController();
          return $next($request);
        }else{
           return redirect()->route('auth.logout');
        }
      });
    }
    protected function permissionManager(){
       $current_usuario=$this->current_usuario;
	   $role=new Role();
       $permission=new Permission();
	   $roles=$role->all();
       $permissions=$permission->all();
	   $perm_role=new Permission_Role();
	  
       return view('admin.permission-role.permission-manager',compact('roles','permissions','perm_role','current_usuario'));
    }
	protected function saveOrDelete(Request $request){
	    $perm_role=new Permission_Role();
		$arrayService=new ArrayService();
		$permissions_array=$request->input('permissions');
		$perm_role_all_array=$arrayService->joinArray($perm_role->pluck('permission_id')->toArray(),$perm_role->pluck('role_id')->toArray());
        for ($i=0;$i<count($permissions_array);$i++){
            $perm_role_exp=explode(" ",$permissions_array[$i]);
			
            $member=$arrayService->member($perm_role_exp[0].$perm_role_exp[1],$perm_role_all_array);
			
            if ($member===false){
            	
                $this->save($perm_role_exp[0],$perm_role_exp[1]);
            }   
        }
		foreach ($perm_role->all() as $perm_role){
		 	 $member=$arrayService->member($perm_role->permission_id.' '.$perm_role->role_id,$permissions_array);
			 if ($member===false){
			 	$this->destroy($perm_role->id);
			 }
           }
		 Session::flash('succesfull_message','Se ha actualizado correctamente');
          return redirect()->route('permission.manager');
	}
	protected function save($permision_id,$role_id){
          $perm_role=new Permission_Role();
		  $perm_role->permission_id=$permision_id;
		  $perm_role->role_id=$role_id;
	      $perm_role->save();	
	}
    public function destroy($id){
        $perm_role=new Permission_Role();
        $perm_role=$perm_role->findOrFail($id);
        $perm_role->delete();
    }
   var $ajustes_cont;
   var $current_usuario;
}
