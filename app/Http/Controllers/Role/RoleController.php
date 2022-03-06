<?php

namespace App\Http\Controllers\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajustes\AjustesController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Validations\RoleValidate;
use App\Models\role;

class RoleController extends Controller{
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
    protected function nuevo(){
         $current_usuario=$this->current_usuario;
         return view('admin.role.new',compact('current_usuario'));
    }
    protected  function create(Request $request){
         $role = new Role();
         $role->name=$request->input('name');
         $role->slug=$request->input('slug');
         $role->save();
         Session::flash('succesfull_message','El registro se ha creado correctamente');
         return redirect()->route('role.index');

    }
    protected function edit($id){
          $role=new Role();
          $role=$role->findOrFail($id);
          $current_usuario=$this->current_usuario;
          return view('admin.role.edit',compact('role','current_usuario'));

    }
    protected function update($id,Request $request){
          $role=new Role();
          $role=$role->findOrFail($id);
          $role->name=$request->input('name');
          $role->slug=$request->input('slug');
          $role->save();
		  if ($audit = Auditor::execute($role)) {
                Auditor::prune($role);
		  }
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('role.index');
   
    }
    protected function show($id,Request $request ){
          $role=new Role();
          $role=$role->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$role->id,
                'role' =>$role->name,
            ]);

          }
    }
    protected function destroy($id){
        $role=new Role();
        $role=$role->findOrFail($id);
        try{
         foreach($role->permissions as $perm_role){
		  	 	$perm_role->delete();
		  }	
          $role->delete();
          Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        }catch (\Exception $e){
               Session::flash('error_succesfull_message','No se puede eliminar el registro porque esta en uso');
        }
        return redirect()->route('role.index');

    }
    protected function index(){
        $role = new Role(); 
        $roles=$role->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;
        return view('admin.role.index',compact('roles','current_usuario'));

   }
     protected function search(Request $request){
        $role = new Role(); 
        $role->name = $request->input('role');
        $roles= $role->where('name', 'LIKE','%'.$role->name.'%')->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;
        return view('admin.role.index',compact('roles','role','current_usuario'));

   }
     protected function unique(Request $request){
         $role_validate=new RoleValidate();
         if ($request->ajax()){
		   $validate=$role_validate->unique($request->input('id'),$request->input('name'));
		   if ($validate){
		   	  return json_encode(true);
		   }else{
		   	  return json_encode(false);
		   }
		 } 
    }
   var $ajustes_cont,$perm_role_cont;
   var $current_usuario;
}
