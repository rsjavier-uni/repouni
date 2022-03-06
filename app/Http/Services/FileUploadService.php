<?php



namespace App\Http\Services;



use App\Models\ajustes;

class FileUploadService{

     public function __construct(){

  

	}

    public function saveFileUpload($path_upload,$file){

		 $filename=$file->getClientOriginalName();

		 $file->move($path_upload,$filename);

    }

    public  function deleteFileUpload($path_upload,$filename){
          //$file=$path_upload.$filename;   
          $file="assets/images/portada/{$filename}";
          \File::delete($file);

    }

}

