<?php

namespace App\Http\Controllers\Autor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\autor;

class AutorController extends Controller{
     public function __construct(){
      $this->middleware(function ($request, $next) {
        if (Auth::check()){
          $this->current_usuario = Auth::user();
          return $next($request);
        }else{
           return redirect()->route('auth.logout');
        }
      });
	}
    protected function nuevo(){
         $current_usuario=$this->current_usuario;
    	 return view('admin.autor.new',compact('current_usuario'));
    }
    protected  function create(Request $request){
    	 $autor = new Autor();
         $autor->create([
                'nombre'  =>  $request->input('nombre'),
                'apellido'  =>  $request->input('apellido'),
                'direccion'  =>  $request->input('direccion'),
                'telefono'  =>  $request->input('telefono'),
                'email'  =>  $request->input('email'),
         
            ]);
      Session::flash('succesfull_message','El registro se ha creado correctamente');
      return redirect()->route('autor.index');

    }
    protected function edit($id){
          $autor=new autor();
          $autor=$autor->findOrFail($id);
          $current_usuario=$this->current_usuario;
          return view('admin.autor.edit',compact('autor','current_usuario'));

    }
    protected function update($id,Request $request){
          $autor=new Autor();
          $autor=$autor->findOrFail($id);
          $autor->fill([
                'nombre'  =>  $request->input('nombre'),
                'apellido'  =>  $request->input('apellido'),
                'direccion'  =>  $request->input('direccion'),
                'telefono'  =>  $request->input('telefono'),
                'email'  =>  $request->input('email'),
            ]);
          $autor->save();
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('autor.index');
   
    }
    protected function show($id,Request $request ){
          $autor=new Autor();
          $autor=$autor->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$autor->id,
                'nombre' =>$autor->nombre,
                'apellido' =>$autor->apellido,
            ]);

          }
    }

    protected function destroy($id){
        $autor=new Autor();
        $autor=$autor->findOrFail($id);
		try{
          $autor->delete();
          Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        }catch (\Exception $e){
               Session::flash('error_succesfull_message','No se puede eliminar el registro porque esta en uso');
        }
        return redirect()->route('autor.index');

    }
    protected function index(){
        $autor = new Autor(); 
        $autors=$autor->paginate(8);
        $current_usuario=$this->current_usuario;
        return view('admin.autor.index',compact('autors','current_usuario'));

   }
     protected function search(Request $request){
        $autor = new Autor(); 
        $autor->nombre = $request->input('nombre');
        $autor->apellido = $request->input('apellido');
        $autor->telefono = $request->input('telefono');
        $autor->email = $request->input('email');
        $autors= $autor->where('nombre', 'LIKE','%'.$autor->nombre.'%')->where('apellido', 'LIKE','%'.$autor->apellido.'%')->where('telefono', 'LIKE','%'.$autor->telefono.'%')->where('email', 'LIKE','%'.$autor->email.'%')->paginate(8);
        $current_usuario=$this->current_usuario;
        return view('admin.autor.index',compact('autors','autor','current_usuario'));

   }
   var $autor;
   var $current_usuario;
}
