<?php

namespace App\Http\Controllers\Sites\DatosAbiertos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\datoabierto;
use App\Http\Services\ArrayService;
use App\Http\Services\EmailService;
use App\Models\ajustes;
use App\Models\area;
use App\Models\facultad;

class DatosAbiertosController extends Controller{

    public function __construct(){
       $ajustes = new Ajustes();
       $this->area = new Area();
       $this->areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'area')->toArray();
       $this->ajustes = $ajustes->findOrFail($ajustes->first()->id);   
	   $this->investigacion = new DatoAbierto();
    }

    protected function index(){
        $ajustes = $this->ajustes;
        $investigaciones = $this->investigacion->orderBy('created_at', 'asc')->paginate(7);
        $areas = $this->area->orderBy('area','asc')->get();
        $arrayService = new ArrayService();
        $investigacion_min_year = $this->investigacion->min('anho');
		$investigacion_max_year = $this->investigacion->max('anho');
		$investigacion_years = $arrayService->createIntervalNumberArray($investigacion_min_year, $investigacion_max_year);

        return view('sites.datos-abiertos.index',compact('ajustes', 'investigaciones', 'areas', 'investigacion_years'));
    }

    protected function view($id){
        $investigacion = $this->investigacion->findOrFail($id);
        $ajustes = $this->ajustes;
		$areas = $this->area->orderBy('area','asc');

        return view('sites.datos-abiertos.show',compact('investigacion', 'ajustes', 'areas'));
    }

    protected function document_view($id){
        $investigacion = $this->investigacion->findOrFail($id);
        $ajustes = $this->ajustes;
        $areas = $this->area->all();

        return view('sites.datos-abiertos.document_view',compact('investigacion', 'ajustes', 'areas'));
    }

    protected function advancedSearch(Request $request){
        $this->investigacion->mostrar  =$request->input('mostrar');
        $this->investigacion->palabra_clave = $request->input('palabra_clave');
        $this->investigacion->orden = $request->input('orden');
        $this->investigacion->anho_desde = $request->input('anho_desde');
        $this->investigacion->anho_hasta = $request->input('anho_hasta');
        $arrayService = new ArrayService();
        $investigacion = $this->investigacion;
		$count_all = $investigacion->count();
        $ajustes = $this->ajustes;
		$areas = $this->area->all();
        $investigacion_min_year = $this->investigacion->min('anho');
        $investigacion_max_year = $this->investigacion->max('anho');
        $investigacion_years = $arrayService->createIntervalNumberArray($investigacion_min_year, $investigacion_max_year);
        $investigacion_lists = $this->investigacion
                                ->where('titulo', 'LIKE','%'.$this->investigacion->palabra_clave.'%')
                                ->whereBetween('anho',[$this->investigacion->anho_desde, $this->investigacion->anho_hasta])
                                ->orderBy('created_at','asc')
                                ->paginate($this->investigacion->mostrar);
 
       return view('sites.datos-abiertos.search-view',compact('ajustes','areas','investigacion','investigacion_lists','investigacion_years','count_all'));
    }

    protected $ajustes;
    protected $investigacion;
    protected $area, $areas;
}

