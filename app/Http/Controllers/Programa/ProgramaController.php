<?php

namespace App\Http\Controllers\Programa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\programa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProgramaController extends Controller{
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
    	return view('admin.programa.new',compact('current_usuario'));
    }

    protected  function create(Request $request){
    	$programa = new Programa();
        $programa->create([
            'anho_acreditacion'  =>     $request->input('anho_acreditacion'),
            'titulo'  =>                $request->input('titulo'),
            'descripcion'  =>           $request->input('descripcion'),
        ]);

        Session::flash('succesfull_message','El registro se ha creado correctamente');
        return redirect()->route('programa.index');
    }

    protected function edit($id){
          $programa=new Programa();
          $programa=$programa->findOrFail($id);
          $current_usuario=$this->current_usuario;

          return view('admin.programa.edit',compact('programa','current_usuario'));
    }

    protected function update($id,Request $request){
        $programa = new Programa();
        $programa = $programa->findOrFail($id);
        $programa->fill([
            'anho_acreditacion' =>      $request->input('anho_acreditacion'),
            'titulo' =>                 $request->input('titulo'),
            'descripcion' =>            $request->input('descripcion'),
        ]);
        $programa->save();
        Session::flash('succesfull_message','El registro se ha actualizado correctamente');
        return redirect()->route('programa.index');
    }

    protected function show($id,Request $request ){
        $programa = new Programa();
        $programa = $programa->findOrFail($id);
        if ($request->ajax()){
            return response()->json([
                'id' =>                     $programa->id,
                'anho_acreditacion' =>      $programa->anho_acreditacion,
                'titulo' =>                 $programa->titulo,
                'descripcion' =>            $programa->descripcion,
            ]);
        }
    }

    protected function destroy($id){
        $programa = new Programa();
        $programa=$programa->findOrFail($id);
		
        try{
            $programa->delete();
            Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        }catch (\Exception $e){
            Session::flash('error_succesfull_message','No se puede eliminar el registro porque esta en uso');
        }
        
        return redirect()->route('programa.index');
    }

    protected function index(){
        $programa = new Programa(); 
        $programas = $programa->paginate(8);
        $current_usuario = $this->current_usuario;

        return view('admin.programa.index',compact('programas','current_usuario'));
    }

    protected function search(Request $request){
        $programa = new Programa(); 
        $programas = $programa
                        ->where('titulo', 'LIKE',"%{$request->input('titulo')}%")
                        ->where('anho_acreditacion', 'LIKE', "%{$request->input('anho_acreditacion')}%")
                        ->paginate(8);
        $current_usuario = $this->current_usuario;

        return view('admin.programa.index',compact('programas', 'programa','current_usuario'));
    }

   var $programa;
   var $current_usuario;
}
