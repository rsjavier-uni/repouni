<?php

namespace App\Http\Controllers\DatosAbiertos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajustes\AjustesController;
use App\Http\Services\FileUploadService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\datoabierto;
use App\Models\area;
use App\Models\DatosAbiertos;
use App\Models\programa;

class DatosAbiertosController extends Controller{
    
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if (Auth::check()){
                $this->current_usuario = Auth::user();
		        $this->area = new Area();
                $this->programa = new Programa();
                $this->ajustes_cont = new AjustesController();
                $this->file_upload_serv = new FileUploadService();
		        $this->areas = [''=>'-- Seleccione --'] + $this->area->orderBy('area','asc')->pluck('area', 'id')->toArray();
                $this->programas = [''=>'-- Seleccione --'] + $this->programa->orderBy('titulo','asc')->pluck('titulo', 'id')->toArray();

                return $next($request);
            } else {
                return redirect()->route('auth.logout');
            }
        });
    }

    protected function nuevo(){
        $current_usuario = $this->current_usuario;
        $programas = $this->programas;
		$areas = $this->areas;

        return view('admin.datos-abiertos.new',compact('current_usuario', 'programas', 'areas'));
    }

    protected  function create(Request $request){
        $investigacion = new DatoAbierto();
        $portada = $request->file('portada');
        $archivo_pdf = $request->file('archivo');
        $investigacion->titulo = $request->input('titulo');
        $investigacion->autor = $request->input('autor');
        $investigacion->area_id = $request->input('area_id');
        $investigacion->programa_id = $request->input('programa_id');
        $investigacion->anho = $request->input('anho');
        $investigacion->descripcion = $request->input('descripcion');
        $investigacion->nombre_portada = $portada->getClientOriginalName();
        $investigacion->nombre_documento = $archivo_pdf->getClientOriginalName();
        $investigacion->path_portada = $this->ajustes_cont->getPathImgUpload();
        $investigacion->path_document = $this->ajustes_cont->getPathDocumentUpload();
        $investigacion->idioma = $request->input('idioma');
        $investigacion->save();

        $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathImgUpload(), $portada);
        $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathDocumentUpload(), $archivo_pdf);

        Session::flash('succesfull_message', 'El registro se ha creado correctamente');
        return redirect()->route('datos-abiertos.index');
    }

    protected function edit($id){
        $investigacion = new DatoAbierto();
        $investigacion = $investigacion->findOrFail($id);
        $current_usuario = $this->current_usuario;
        $areas = $this->areas;
		$programas = $this->programas;

        return view('admin.datos-abiertos.edit',compact('investigacion', 'current_usuario', 'areas', 'programas'));
    }

    protected function update($id,Request $request){   
        $investigacion = new DatoAbierto();
        $portada = $request->file('portada');
        $archivo_pdf = $request->file('archivo');
        $investigacion = $investigacion->findOrFail($id);
        $investigacion->titulo = $request->input('titulo');
        $investigacion->autor = $request->input('autor');
        $investigacion->area_id = $request->input('area_id');
        $investigacion->programa_id = $request->input('programa_id');
        $investigacion->anho = $request->input('anho');
        $investigacion->descripcion = $request->input('descripcion');
        $investigacion->idioma = $request->input('idioma');
        $investigacion->nombre_portada = is_null($portada) ? $investigacion->nombre_portada : $portada->getClientOriginalName();
        $investigacion->nombre_documento = is_null($archivo_pdf) ? $investigacion->nombre_documento : $archivo_pdf->getClientOriginalName();
        $investigacion->path_portada = is_null($portada) ? $investigacion->path_portada : $this->ajustes_cont->getPathImgUpload();
        $investigacion->path_document = is_null($archivo_pdf) ? $investigacion->path_document : $this->ajustes_cont->getPathDocumentUpload();
        $investigacion->save();

        if (!is_null($portada)){
            $this->file_upload_serv->deleteFileUpload($this->ajustes_cont->getPathImgUpload(),$investigacion->portada);
            $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathImgUpload(),$portada);
        }

        if (!is_null($archivo_pdf)){
            $this->file_upload_serv->deleteFileUpload($this->ajustes_cont->getPathDocumentUpload(),$investigacion->archivo);
            $this->file_upload_serv->saveFileUpload($this->ajustes_cont->getPathDocumentUpload(),$archivo_pdf);
        }
          
        Session::flash('succesfull_message', 'El registro se ha actualizado correctamente');
        return redirect()->route('datos-abiertos.index');
    }

    protected function show($id,Request $request ){
        $investigacion = new DatoAbierto();
        $investigacion = $investigacion->findOrFail($id);
        
        if ($request->ajax()){
            return response()->json([
                'id'     => $investigacion->id,
                'titulo' => $investigacion->titulo,
            ]);
        }
    }

    protected function destroy($id){
        $investigacion=new DatoAbierto();
        $investigacion=$investigacion->findOrFail($id);
        $investigacion->delete();

        Session::flash('succesfull_message', 'El registro se ha eliminado correctamente');
        return redirect()->route('datos-abiertos.index');
    }

    protected function index(){
        $investigacion = new DatoAbierto(); 
        $investigaciones = $investigacion->paginate($this->ajustes_cont->getElementPerPage());
		$areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'area')->toArray();
        $programas = [''=>'-- Seleccione --']+$this->programa->orderBy('titulo','asc')->pluck('titulo', 'titulo')->toArray();
        $current_usuario = $this->current_usuario;

        return view('admin.datos-abiertos.index',compact('investigaciones', 'areas', 'programas', 'current_usuario'));
    }
    
    protected function search(Request $request){
        $investigacion = new DatoAbierto(); 
        $titulo_s = $request->input('titulo');
        $area_s = $request->input('area');
        $programa_s = $request->input('programa');
        $investigaciones= $investigacion
                            ->where('titulo', 'LIKE', "%{$titulo_s}%")
                            ->whereHas('area', function($q) use($area_s){ $q->where('area','like','%'.$area_s.'%'); })
                            ->whereHas('programa', function($q) use($programa_s){ $q->where('titulo','like','%'.$programa_s.'%'); })
                            ->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;

	    $areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'area')->toArray();
        $programas = [''=>'-- Seleccione --'] + $this->programa->orderBy('titulo','asc')->pluck('titulo', 'id')->toArray();
        return view('admin.datos-abiertos.index',compact('investigaciones', 'areas', 'programas', 'current_usuario'));
    }
  
    protected $investigacion, $investigaciones;
    protected $current_usuario;
    protected $area, $areas;
    protected $programa, $programas;
    protected $ajustes_cont, $file_upload_serv;
}
