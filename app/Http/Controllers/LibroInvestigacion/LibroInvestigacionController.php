<?php

namespace App\Http\Controllers\LibroInvestigacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibroInvestigacionAutor\LibroInvestigacionAutorController;
use App\Http\Controllers\LibroInvestigacionCarrera\LibroInvestigacionCarreraController;
use App\Http\Controllers\Ajustes\AjustesController;
use App\Http\Services\FileUploadService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\libroinvestigacion;
use App\Models\facultad;
use App\Models\carrera;
use App\Models\autor;
use App\Models\indice;
use App\Models\cita;
use App\Models\area;
class LibroInvestigacionController extends Controller{
     public function __construct(){
      $this->middleware(function ($request, $next) {
        if (Auth::check()){
          $this->current_usuario = Auth::user();
          $this->autor=new Autor();
          $this->facultad=new Facultad();
          $this->carrera=new Carrera();
          $this->indice=new Indice();
          $this->cita=new Cita();
		  $this->area=new Area();
          $this->ajustes_cont=new AjustesController();
          $this->libro_inv_aut_cont=new LibroInvestigacionAutorController();
          $this->libro_inv_carr_cont=new LibroInvestigacionCarreraController();
          $this->file_upload_serv=new FileUploadService();
          $this->autores = $this->autor->all(['nombre','apellido','id'])->pluck('fullname', 'id');
		  $this->areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'id')->toArray();
          return $next($request);
        }else{
           return redirect()->route('auth.logout');
        }
      });
    }
    protected function nuevo(){
         $current_usuario=$this->current_usuario;
         $autores=$this->autores;
		 $areas=$this->areas;
         $facultades=$this->facultad->pluck('facultad', 'id');
         $carreras=$this->carrera->whereHas('facultad', function($q) { $q->where('facultad','Ingenieria'); })->pluck('carrera', 'id');
         return view('admin.libro-inv.new',compact('current_usuario','autores','facultades','carreras','areas'));
    }
    protected  function create(Request $request){
         $libroinv = new LibroInvestigacion();
         $portada=$request->file('portada');
         $archivo_pdf=$request->file('archivo');
         $libroinv->cod_doi=$request->input('cod_doi');
         $libroinv->titulo=$request->input('titulo');
         $libroinv->area_id=$request->input('area_id');
         $libroinv->año=$request->input('año');
         $libroinv->descripcion=$request->input('descripcion');
         $libroinv->portada_name=$portada->getClientOriginalName();
         $libroinv->document_name=$archivo_pdf->getClientOriginalName();
         $libroinv->path_portada=$this->ajustes_cont->getPathImgUpload();
         $libroinv->path_document=$this->ajustes_cont->getPathDocumentUpload();
         $libroinv->idioma = $request->input('idioma');
         $libroinv->categoria=$request->input('categoria');  
		 $libroinv->save();
         $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathImgUpload(),$portada);
         $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathDocumentUpload(),$archivo_pdf);
         $this->libro_inv_aut_cont->createSelectedByAutor($libroinv->id,$request->input('autores'));
		 if ($libroinv->categoria=="TFG"){
           $this->libro_inv_carr_cont->saveOrUpdate($libroinv->id,$request->input('carrera'));
         }
        Session::flash('succesfull_message','El registro se ha creado correctamente');
        return redirect()->route('libroinv.index');
 
    }
    protected function edit($id){
          $libroinv=new LibroInvestigacion();
          $libroinv=$libroinv->findOrFail($id);
          $current_usuario=$this->current_usuario;
          $autores=$this->autores;
		      $areas=$this->areas;
          $libroinv->autores=$libroinv->invautores->pluck('autor_id');
          $facultades=$this->facultad->pluck('facultad', 'id');
          $indices=$this->indice->where('libro_inv_id','=',$id)->paginate($this->ajustes_cont->getElementPerPage());
          $citas=$this->cita->where('libro_inv_id','=',$id)->paginate($this->ajustes_cont->getElementPerPage());
          if ( $libroinv->categoria=="TFG"){
            $facultad_id=$libroinv->invcarreras->first()->carrera->facultad->id;
            $carreras=$this->carrera->where('facultad_id','=',$facultad_id)->pluck('carrera', 'id');
            $libroinv->facultad=$facultad_id;
            $libroinv->carrera=$libroinv->invcarreras->first()->carrera_id;
          }else{
             $carreras=$this->carrera->pluck('carrera', 'id');
          }
          
          return view('admin.libro-inv.edit',compact('libroinv','autores','current_usuario','facultades','carreras','indices','citas','areas'));

    }
    protected function update($id,Request $request){
          $libroinv=new LibroInvestigacion();
          $portada=$request->file('portada');
          $archivo_pdf=$request->file('archivo');
          $libroinv=$libroinv->findOrFail($id);
          $libroinv->cod_doi=$request->input('cod_doi');
          $libroinv->titulo  =  $request->input('titulo');
          $libroinv->area_id  =  $request->input('area_id');
          $libroinv->año  =  $request->input('año');
          $libroinv->descripcion  =  $request->input('descripcion');
          $libroinv->portada_name  =  is_null($portada)?$libroinv->portada_name:$portada->getClientOriginalName();
          $libroinv->document_name  =  is_null($archivo_pdf)?$libroinv->document_name:$archivo_pdf->getClientOriginalName();
          $libroinv->path_portada= is_null($portada)?$libroinv->path_portada:$this->ajustes_cont->getPathImgUpload();
          $libroinv->path_document= is_null($archivo_pdf)?$libroinv->path_document:$this->ajustes_cont->getPathDocumentUpload();
          $libroinv->idioma  =  $request->input('idioma');
          $libroinv->categoria  =  $request->input('categoria');
          $libroinv->save();
          if (!is_null($portada)){
             $this->file_upload_serv->deleteFileUpload($this->ajustes_cont->getPathImgUpload(),$libroinv->portada);
             $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathImgUpload(),$portada);
          }
          if (!is_null($archivo_pdf)){
             $this->file_upload_serv->deleteFileUpload($this->ajustes_cont->getPathDocumentUpload(),$libroinv->archivo);
             $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathDocumentUpload(),$archivo_pdf);
          }
          $this->libro_inv_aut_cont->createOrDeleteLibroInvAutor($id,$request->input('autores'));
          if ($libroinv->categoria=="TFG"){
            $this->libro_inv_carr_cont->saveOrUpdate($id,$request->input('carrera'));
          }
          
          Session::flash('succesfull_message','El registro se ha actualizado correctamente');
          return redirect()->route('libroinv.index');
   
    }
    protected function show($id,Request $request ){
          $libroinv=new LibroInvestigacion();
          $libroinv=$libroinv->findOrFail($id);
          if ($request->ajax()){
            return response()->json([
                'id'     =>$libroinv->id,
                'titulo' =>$libroinv->titulo,
            ]);

          }
    }

    protected function destroy($id){
        $libroinv=new LibroInvestigacion();
        $libroinv=$libroinv->findOrFail($id);
        foreach ($libroinv->invautores as $libro_inv_aut) {
            $libro_inv_aut->delete();
        }
        foreach ($libroinv->invcarreras as $libro_inv_carr) {
            $libro_inv_carr->delete();
        }
        foreach ($libroinv->citas as $cita) {
            $cita->delete();
        }
        foreach ($libroinv->indices as $indice) {
            $indice->delete();
        }
        $libroinv->delete();
        Session::flash('succesfull_message','El registro se ha eliminado correctamente');
        return redirect()->route('libroinv.index');

    }
    protected function index(){
        $libroinv = new LibroInvestigacion(); 
        $libro_inv_aut_cont=new LibroInvestigacionAutorController();
        $libroinvs=$libroinv->paginate($this->ajustes_cont->getElementPerPage());
		$areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'area')->toArray();
        $current_usuario=$this->current_usuario;
        return view('admin.libro-inv.index',compact('libroinvs','areas','current_usuario'));

   }
     protected function search(Request $request){
        $libroinv = new LibroInvestigacion(); 
        $libroinv->titulo = $request->input('titulo');
        $libroinv->area = $request->input('area');
		$area=$request->input('area');
        $libroinv->categoria = $request->input('categoria');
        $libroinvs= $libroinv->where('titulo', 'LIKE','%'.$libroinv->titulo.'%')->whereHas('area', function($q) use($area){ $q->where('area','like','%'.$area.'%'); })->where('categoria',$libroinv->categoria)->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;
	    $areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'area')->toArray();
        return view('admin.libro-inv.index',compact('libroinvs','libroinv','areas','current_usuario'));

   }
  
   protected $libroinv,$indice,$cita;
   protected $current_usuario;
   protected $autor,$autores;
   protected $facultad,$carrera;
   protected $area,$areas;
   protected $ajustes_cont,$file_upload_serv;
   protected $libro_inv_aut_cont,$libro_inv_carr_cont;
  
}
