<?php

namespace App\Http\Controllers\Area;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\area;

class AreaController extends Controller{
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
    	 return view('admin.area.new',compact('current_usuario'));
    }
    protected  function create(Request $request){
    	 $area = new Area();
         $area->create([
                'area'  =>  $request->input('area'),
         
            ]);
      Session::flash('succesfull_message','El registro se ha creado correctamente');
      return redirect()->route('area.index');

    }
    protected function edit($id){
          $area=new Area();
          $area=$area->findOrFail($id);
          $current_usuario=$this->current_usuario;
          return view('admin.area.edit',compact('area','current_usuario'));

    }
    protected function update($id,Request $request){
          $Area=new Area();
          $Area=$Area->findOrFail($id);
          $Area->fill([
                'area'  =>  $request->input('area'),
            ]);
          $Area->save();
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('area.index');
   
    }
    protected function show($id,Request $request ){
          $area=new Area();
          $area=$area->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$area->id,
                'area' =>$area->area,
            ]);

          }
    }

    protected function destroy($id){
        $area=new Area();
        $area=$area->findOrFail($id);
		try{
          $area->delete();
          Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        }catch (\Exception $e){
               Session::flash('error_succesfull_message','No se puede eliminar el registro porque esta en uso');
        }
        return redirect()->route('area.index');

    }
    protected function index(){
        $area = new Area(); 
        $areas=$area->paginate(8);
        $current_usuario=$this->current_usuario;
        return view('admin.area.index',compact('areas','current_usuario'));

   }
     protected function search(Request $request){
        $area = new Area(); 
        $area->area = $request->input('area');
        $areas= $area->where('area', 'LIKE','%'.$area->area.'%')->paginate(8);
        $current_usuario=$this->current_usuario;
        return view('admin.area.index',compact('areas','area','current_usuario'));

   }
   var $area;
   var $current_usuario;
}
