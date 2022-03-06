<?php
namespace App\Http\Controllers\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajustes\AjustesController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRegister;
class UsuarioRegisterController extends Controller{
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
    	 return view('admin.usuario-register.new',compact('current_usuario'));
    }
    protected  function create(Request $request){
    	 $usuario_reg = new UserRegister();
         $usuario_reg->create([
                'nombre'=>$request->input('nombre'),
                'apellido'=>$request->input('apellido'),
                'email'=>$request->input('email'),
                'organizacion'=>$request->input('organizacion'),
                'ocupacion'=>$request->input('ocupacion'),
                'username'  =>  $request->input('username'),
                'password'  =>  \Hash::make($request->input('password')),
            ]);
         Session::flash('succesfull_message','El registro se ha creado correctamente');
          return redirect()->route('usuario-reg.index');
    }
    protected function edit($id){
          $usuario_reg=new UserRegister();
          $usuario_reg=$usuario_reg->findOrFail($id);
          $current_usuario=$this->current_usuario;
          return view('admin.usuario-register.edit',compact('usuario_reg','current_usuario'));
    }
    protected function update($id,Request $request){
          $usuario_reg=new UserRegister();
          $usuario_reg=$usuario_reg->findOrFail($id);
          $usuario_reg->fill([
                'nombre'=>$request->input('nombre'),
                'apellido'=>$request->input('apellido'),
                'email'=>$request->input('email'),
                'organizacion'=>$request->input('organizacion'),
                'ocupacion'=>$request->input('ocupacion'),
                'username'  =>  $request->input('username'),
                'password'  =>  empty($request->input('password'))?$usuario_reg->password:\Hash::make($request->input('password')),
            ]);
          $usuario_reg->save();
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('usuario-reg.index');
    }
    protected function show($id,Request $request ){
          $usuario_reg=new UserRegister();
          $usuario_reg=$usuario_reg->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$usuario_reg->id,
                'username' =>$usuario_reg->username,
            ]);
          }
    }
    protected function destroy($id){
        $usuario_reg=new UserRegister();
        $usuario_reg=$usuario_reg->findOrFail($id);
        $usuario_reg->delete();
        Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        return redirect()->route('usuario-reg.index');
    }
    protected function index(){
        $usuario_reg = new UserRegister(); 
        $usuarios_regs=$usuario_reg->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;
        return view('admin.usuario-register.index',compact('usuarios_regs','current_usuario'));
   }
   protected function search(Request $request){
        $usuario_reg = new UserRegister(); 
        $usuario_reg->username = $request->input('username');
		$usuario_reg->ocupacion = $request->input('ocupacion');
        $usuarios_regs= $usuario_reg->where('username', 'LIKE','%'.$usuario_reg->username.'%')->where('ocupacion', '=',$usuario_reg->ocupacion)->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;
        return view('admin.usuario-register.index',compact('usuarios_regs','usuario_reg','current_usuario'));
   }
   var $usuario,$current_usuario;
   var $role,$roles;
   var $role_user;
   var $role_user_cont,$ajustes_cont;
}
