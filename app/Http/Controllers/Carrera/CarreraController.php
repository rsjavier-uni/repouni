<?php

namespace App\Http\Controllers\Carrera;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\carrera;

class CarreraController extends Controller{
     public function __construct(){
 
	}
    
     protected function search(Request $request){
        $carrera = new Carrera(); 
        $facultad_id = $request->input('facultad_id');
        $carreras= $carrera->where('facultad_id', '=',$facultad_id)->get();
       if ($request->ajax()){
            return response()->json($carreras);
	   }

   }
}
