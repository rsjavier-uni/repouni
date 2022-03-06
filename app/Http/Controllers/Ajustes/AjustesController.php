<?php

namespace App\Http\Controllers\Ajustes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\FileUploadService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;;
use App\Models\ajustes;
class AjustesController extends Controller{
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
    protected function ajustes(){
              $ajustes=new Ajustes();
              $ajustes=$ajustes->findOrFail($ajustes->first()->id);
              $ajustes->logo_filename=$this->getFileName($ajustes->logo_url);
              $current_usuario=$this->current_usuario;
              return view('admin.ajustes.form',compact('ajustes','current_usuario'));
    }
	protected function update($id,Request $request){
          $ajustes=new Ajustes();
          $ajustes=$ajustes->findOrFail($id);
          $file_upload_serv=new FileUploadService();
          $logo=$request->file('logo');
          $logo_current_path=$ajustes->logo_url;
          $ajustes->fill([
                'titulo_sitio'  =>  $request->input('titulo_sitio'),
                'logo_url'  => is_null($logo)?$ajustes->logo_url:$request->input('path_img_upload').$logo->getClientOriginalName(),
                'path_img_upload'  =>  $request->input('path_img_upload'),
                'path_document_upload'  =>  $request->input('path_document_upload'),
                'elements_per_page'  =>  $request->input('elements_per_page'),
                'mail_to'  =>  $request->input('mail_to'),
            ]);
                         
		 if (!is_null($logo)){
						 $path_url_old=$this->getURLPath($logo_current_path);
                         $filename_old=$this->getFileName($logo_current_path);
                         $file_upload_serv->deleteFileUpload($path_url_old,$filename_old);
			 $file_upload_serv->saveFileUpload($request->input('path_img_upload'),$logo);
		  }
          $ajustes->save();
		  
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('ajustes.ajustes');
		
	}
	public function getPathImgUpload(){
		 $ajustes=new Ajustes();
         $ajustes=$ajustes->findOrFail($ajustes->first()->id);
		 return $ajustes->path_img_upload;
	}
	public function getPathDocumentUpload(){
		 $ajustes=new Ajustes();
         $ajustes=$ajustes->findOrFail($ajustes->first()->id);
		 return $ajustes->path_document_upload;
	}
	protected function getFileName($url){
		 $url_array=explode("/",$url);
		 return $url_array[sizeof($url_array)-1];
	}
	protected function getURLPath($url){
		 $url_array=explode("/",$url);
         $path_url="";
           for ($i=1; $i < sizeof($url_array)-1; $i++) {
               $path_url=$path_url.$url_array[$i].'/';
           }
		 return $path_url;
	} 
	public function getElementPerPage(){
		 $ajustes=new Ajustes();
         $ajustes=$ajustes->findOrFail($ajustes->first()->id);
		 return $ajustes->elements_per_page;
	}
   protected $current_usuario;
}
