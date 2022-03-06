<?php

namespace App\Http\Controllers\Cita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Ajustes\AjustesController;
use App\Models\cita;
class CitaController extends Controller{
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
    protected function view(){
    	$cita=new Cita();
        $current_usuario=$this->current_usuario;
		$citas=$cita->paginate($this->ajustes_cont->getElementPerPage());
    	return view('admin.cita.popup-view',compact('current_usuario','citas'));
    }
    protected  function create(Request $request){
    	 $cita = new Cita();
         $cita->create([
                'cita'  =>  $request->input('cita'),
                'libro_inv_id'  =>  $request->input('libro_inv_id'),
         ]);
    }
    protected function edit($id){
          $cita=new Cita();
          $cita=$cita->findOrFail($id);
          if (\Request::ajax()){
            return response()->json([
                'id'     =>$cita->id,
                'cita' =>$cita->cita,
            ]);

          }
    }
    protected function update($id,Request $request){
          $cita=new Cita();
          $cita=$cita->findOrFail($id);
          $cita->fill([
                'cita'  =>  $request->input('cita'),
                'libro_inv_id'  =>  $request->input('libro_inv_id'),
            ]);
          $cita->save();
    }
    protected function saveOrUpdate(Request $request){
        $cita_id=$request->input('cita_id');
        if ($request->ajax()){
            if (!empty($cita_id)){
                $this->update($cita_id,$request);
               echo 0;
            }else{
                $this->create($request);
                echo 1;
            }
        }
    }
    protected function show($id,Request $request ){
          $cita=new Cita();
          $cita=$cita->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$cita->id,
                'cita' =>$cita->cita,
            ]);

          }
    }
	protected function lists($libro_inv_id){
	  if(\Request::ajax()) {
	    $cita=new Cita();
		$citas=$cita->where('libro_inv_id','=',$libro_inv_id)->paginate($this->ajustes_cont->getElementPerPage());
        $returnHTML = view('admin.cita.index',compact('citas'))->with('citaTable')->render();
         return response()->json(array('citaTable'=>$returnHTML));
	  }
		
	}

    protected function destroy($id){
        $cita=new Cita();
        $cita=$cita->findOrFail($id);
        if(\Request::ajax()){
            $cita->delete();
			echo 1;
        }
    }
   protected $current_usuario;
   protected $ajustes_cont;
}
