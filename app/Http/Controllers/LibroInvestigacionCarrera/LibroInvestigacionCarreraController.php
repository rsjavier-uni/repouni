<?php

namespace App\Http\Controllers\LibroInvestigacionCarrera;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\libroinvestigacioncarrera;
class LibroInvestigacionCarreraController extends Controller{
     public function __construct(){
    }

    public function create($libro_inv_id,$carrera_id){
    	 $libroinvcarr= new LibroInvestigacionCarrera();
         $libroinvcarr->carrera_id = $carrera_id;
         $libroinvcarr->libro_inv_id  = $libro_inv_id;
         $libroinvcarr->save();
    }
    public function update($id,$carrera_id,$libro_inv_id){
          $libroinvcarr=new LibroInvestigacionCarrera();
          $libroinvcarr=$libroinvcarr->findOrFail($id);
          $libroinvcarr->carrera_id = $carrera_id;
          $libroinvcarr->libro_inv_id  = $libro_inv_id;
          $libroinvcarr->save();   
    }
    public function destroy($id){
        $libroinvcarr=new LibroInvestigacionCarrera();
        $libroinvcarr=$libroinvcarr->findOrFail($id);
        $libroinvcarr->delete();
    }
	public function saveOrUpdate($libro_inv_id,$carrera_id){
		 $libroinvcarr= new LibroInvestigacionCarrera();
		 $libroinvcarr=$libroinvcarr->where('libro_inv_id','=',$libro_inv_id)->first();     
		 if (!is_null($libroinvcarr)){
		 	if ($libroinvcarr->carrera_id!=$carrera_id){
		 	  $this->update($libroinvcarr->id,$carrera_id,$libro_inv_id);
			}
		 }else{
		 	$this->create($libro_inv_id,$carrera_id);
		 }
		
	}
  
}
