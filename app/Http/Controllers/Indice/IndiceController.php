<?php

namespace App\Http\Controllers\Indice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Ajustes\AjustesController;
use App\Models\indice;
class IndiceController extends Controller{
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
    	$indice=new Indice();
        $current_usuario=$this->current_usuario;
		$indices=$indice->paginate($this->ajustes_cont->getElementPerPage());
    	return view('admin.indice.popup-view',compact('current_usuario','indices'));
    }
    protected  function create(Request $request){
    	 $indice = new Indice();
         $indice->create([
                'indice'  =>  $request->input('indice'),
                'libro_inv_id'  =>  $request->input('libro_inv_id'),
                'pagina'  =>  $request->input('pagina'),
         ]);
    }
    protected function edit($id){
          $indice=new Indice();
          $indice=$indice->findOrFail($id);
          if (\Request::ajax()){
            return response()->json([
                'id'     =>$indice->id,
                'indice' =>$indice->indice,
                'pagina' =>$indice->pagina,
            ]);

          }
    }
    protected function update($id,Request $request){
          $indice=new Indice();
          $indice=$indice->findOrFail($id);
          $indice->fill([
                'indice'  =>  $request->input('indice'),
                'libro_inv_id'  =>  $request->input('libro_inv_id'),
                'pagina'  =>  $request->input('pagina'),
            ]);
          $indice->save();
   
    }
    protected function saveOrUpdate(Request $request){
        $indice_id=$request->input('indice_id');
        if ($request->ajax()){
            if (!empty($indice_id)){
                $this->update($indice_id,$request);
               echo 0;
            }else{
                $this->create($request);
                echo 1;
            }
        }
    }
    protected function show($id,Request $request ){
          $indice=new Indice();
          $indice=$indice->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$indice->id,
                'indice' =>$indice->indice,
            ]);

          }
    }
	protected function lists($libro_inv_id){
	  if(\Request::ajax()) {
	    $indice=new Indice();
		$indices=$indice->where('libro_inv_id','=',$libro_inv_id)->paginate($this->ajustes_cont->getElementPerPage());
        $returnHTML = view('admin.indice.index',compact('indices'))->with('indiceTable')->render();
         return response()->json(array('indiceTable'=>$returnHTML));
	  }
		
	}

    protected function destroy($id){
        $indice=new Indice();
        $indice=$indice->findOrFail($id);
        if(\Request::ajax()) {
            $indice->delete();
			echo 1;
        }
    }
   protected $current_usuario;
   protected $ajustes_cont;
}
