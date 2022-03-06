<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleUser\RoleUserController;
use App\Models\user;
use App\Models\role;
use App\Models\role_user;
class UsuarioController extends Controller{
    public function __construct(){
           $this->middleware(function ($request, $next) {
         if (Auth::check()){
           $this->current_usuario = Auth::user();
		   $this->role_user_cont=new RoleUserController();
		   $this->role=new Role();	
		   $this->role_user=new Role_User();	
		   $this->roles = [''=>'-- Seleccione --']+$this->role->all(['name','id'])->pluck('name', 'id')->toArray();
           return $next($request);
         }else{
           return redirect()->route('auth.logout');
         }
        });
	}
    protected function nuevo(){
         $current_usuario=$this->current_usuario;
		 $roles=$this->roles;
    	 return view('admin.usuario.new',compact('roles','current_usuario'));
    }
    protected  function create(Request $request){
    	 $usuario = new User();
         $usuario->create([
                'username'  =>  $request->input('username'),
                'password'  =>  \Hash::make($request->input('password')),
                'role_id'  => $request->input('role'),
            ]);
		 $usuario->save();
		 $this->role_user_cont->create($usuario->id,$request->input('role'));
         Session::flash('succesfull_message','El registro se ha creado correctamente');
          return redirect()->route('usuario.index');

    }
    protected function edit($id){
          $usuario=new User();
          $usuario=$usuario->findOrFail($id);
		  $usuario->role=$usuario->role_id;
		  $roles=$this->roles;
          $current_usuario=$this->current_usuario;
          return view('admin.usuario.edit',compact('roles','usuario','current_usuario'));

    }
    protected function update($id,Request $request){
          $usuario=new User();
          $usuario=$usuario->findOrFail($id);
          $usuario->fill([
                'username'  =>  $request->input('username'),
                'password'  =>  empty($request->input('password'))?$usuario->password:\Hash::make($request->input('password')),
                'role_id'  =>  $request->input('role'),
		    ]);
          $usuario->save();
		  $role_user_id=$this->role_user->where('user_id',$usuario->id)->first()->id;
		  $this->role_user_cont->update($role_user_id,$usuario->id,$request->input('role'));
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('usuario.index');
   
    }
    protected function show($id,Request $request ){
          $usuario=new User();
          $usuario=$usuario->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$usuario->id,
                'username' =>$usuario->username,
            ]);

          }
    }

    protected function destroy($id){
        $usuario=new User();
        $usuario=$usuario->findOrFail($id);
        $usuario->delete();
        Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        return redirect()->route('usuario.index');

    }
    protected function index(){
        $usuario = new User(); 
        $usuarios=$usuario->paginate(8);
        $current_usuario=$this->current_usuario;
        return view('admin.usuario.index',compact('usuarios','current_usuario'));

   }
     protected function search(Request $request){
        $usuario = new User(); 
        $usuario->username = $request->input('username');
        $usuarios= $usuario->where('username', 'LIKE','%'.$usuario->username.'%')->paginate(8);
        $current_usuario=$this->current_usuario;
        return view('admin.usuario.index',compact('usuarios','usuario','current_usuario'));

   }
     public function findByUser($user_id){
         $user=new User();
         return $user->find($user_id);
     }
   var $usuario,$current_usuario;
   var $role,$roles;
   var $role_user;
   var $role_user_cont;
}
