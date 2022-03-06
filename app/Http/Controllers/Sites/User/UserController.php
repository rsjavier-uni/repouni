<?php

namespace App\Http\Controllers\Sites\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\userregister;
use App\Models\ajustes;
use App\Models\area;
class UserController extends Controller{
    public function __construct(){
       $this->middleware(function ($request, $next) {
         if (Auth::guard('webregister')->check()){
           $this->current_usuario = Auth::guard('webregister')->user();
		   $ajustes=new Ajustes();
		   $this->area=new Area();
     	   $this->ajustes=$ajustes->findOrFail($ajustes->first()->id);
           return $next($request);
         }else{
           return redirect()->back();
         }
       });
	}
    protected function edit(){
          $usuario=new UserRegister();
		  $ajustes=$this->ajustes;
		  $areas=$this->area->all();
		  $current_usuario=$this->current_usuario;
          $user=$usuario->findOrFail($current_usuario->id);
          return view('sites.other-pages.user.edit',compact('ajustes','areas','user'));
    }
    protected function update(Request $request){
          $user=new UserRegister();
		  $ajustes=$this->ajustes;
		  $current_usuario=$this->current_usuario;
          $user=$user->findOrFail($current_usuario->id);
		  $user->nombre=$request->input('nombre');
		  $user->apellido=$request->input('apellido');
		  $user->email=$request->input('email');
		  $user->organizacion=$request->input('organizacion');
		  $user->ocupacion=$request->input('ocupacion');
		  $user->password=empty($request->input('password'))?$user->password:\Hash::make($request->input('password'));
          $user->save();
          Session::flash('succesfull_message','Sus datos se actualizaron correctamente');
          return redirect()->route('webSiteUser.edit');
   
    }
   protected $ajustes,$area,$current_usuario;
}
