<?php

namespace App\Http\Controllers\LibroInvestigacionAutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ArrayService;
use App\Models\libroinvestigacionautor;
class LibroInvestigacionAutorController extends Controller{
     public function __construct(){
    }

    protected  function create($libro_inv_id,$autor_id){
    	 $libroinvaut = new LibroInvestigacionAutor();
         $libroinvaut->create([
                'autor_id'  =>  $autor_id,
                'libro_inv_id'  =>  $libro_inv_id,
            ]);
    }
	
	public function getListByLibroInvAutor($libro_inv_id){
		$libroinvaut = new LibroInvestigacionAutor();
		return  $libroinvaut->where('libro_inv_id',$libro_inv_id)->get();
	}
    protected function update($id,$autor_id,$libro_inv_id){
          $libroinvaut=new LibroInvestigacionAutor();
          $libroinvaut=$libroinvaut->findOrFail($id);
          $libroinvaut->fill([
                'autor_id'  =>  $autor_id,
                'libro_inv_id'  =>  $libro_inv_id,
            ]);
          $libroinvaut->save();     
    }
   public function createSelectedByAutor($libro_inv_id,$autor_array){
		foreach($autor_array as $autor){
			$this->create($libro_inv_id,$autor);
		}
	}
	public function createOrDeleteLibroInvAutor($libro_inv_id,$autor_array){
		  $arrayService=new ArrayService();
		  $libroinvaut = new LibroInvestigacionAutor();
		  $libroinvautors= $libroinvaut->where('libro_inv_id','=',$libro_inv_id)->get();
		 
          foreach($autor_array as $autor_id){
		  	  $exists_autor=$arrayService->member($autor_id,$libroinvautors->pluck('autor_id')->toArray());
                         
			   if($exists_autor===false){
			   	   $this->create($libro_inv_id,$autor_id);
			   }
			    
		  }
		  foreach($libroinvautors as $libroinvautor){
		  	  	$exists_autor=$arrayService->member($libroinvautor->autor_id,$autor_array);
                              
                    if($exists_autor===false){
                                   
			   	   $this->destroy($libroinvautor->id);
			   }
			    
		  }
	}

    protected function destroy($id){
        $libroinvaut=new LibroInvestigacionAutor();
        $libroinvaut=$libroinvaut->findOrFail($id);
        $libroinvaut->delete();
    }
	
  
}
