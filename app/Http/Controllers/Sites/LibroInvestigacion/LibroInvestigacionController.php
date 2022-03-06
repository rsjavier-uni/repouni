<?php
namespace App\Http\Controllers\Sites\LibroInvestigacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\ArrayService;
use App\Http\Controllers\Ajustes\AjustesController;
use App\Models\libroinvestigacion;
use App\Models\ajustes;
use App\Models\area;
class LibroInvestigacionController extends Controller{
    public function __construct(){
	   $ajustes=new Ajustes();
       $this->ajustes=$ajustes->findOrFail($ajustes->first()->id);   
	   $this->ajustes_cont=new AjustesController();
       $this->libro_inv=new LibroInvestigacion();  
	   $this->area=new Area();
    }
    protected function show($id){
        $libroinv=$this->libro_inv->findOrFail($id);
        $ajustes=$this->ajustes;
		$areas=$this->area->orderBy('area','asc');
        return view('sites.libroinv.show',compact('libroinv','ajustes','areas'));
    }
    protected function advancedSearch(Request $request){
        $this->libro_inv->mostrar=$request->input('mostrar');
        $this->libro_inv->palabra_clave=$request->input('palabra_clave');
        $this->libro_inv->orden=$request->input('orden');
        $this->libro_inv->categoria=$request->input('categoria');
        $this->libro_inv->tipo=$request->input('tipo');
        $this->libro_inv->año_desde=$request->input('año_desde');
        $this->libro_inv->año_hasta=$request->input('año_hasta');
        $arrayService=new ArrayService();
        $libro_inv=$this->libro_inv;
		$count_all=$libro_inv->count();
        $ajustes=$this->ajustes;
		$areas=$this->area->all();
        $libro_inv_min_year=$this->libro_inv->min('año');
        $libro_inv_max_year=$this->libro_inv->max('año');
        $libro_inv_years=$arrayService->createIntervalNumberArray($libro_inv_min_year,$libro_inv_max_year);
        switch($this->libro_inv->categoria){
            case "Titulo": 
                 $libro_inv_lists=$this->libro_inv->where('titulo', 'LIKE','%'.$this->libro_inv->palabra_clave.'%')->where('categoria','=',$this->libro_inv->tipo)->whereBetween('año',[$this->libro_inv->año_desde, $this->libro_inv->año_hasta])->orderBy('created_at',$this->libro_inv->orden)->paginate($this->libro_inv->mostrar);
                 break;
            case "Area":
                 $libro_inv_lists=$this->libro_inv->whereHas('area', function($q) { $q->where('area', 'LIKE','%'.$this->libro_inv->palabra_clave.'%'); })->where('categoria','=',$this->libro_inv->tipo)->whereBetween('año', [$this->libro_inv->año_desde, $this->libro_inv->año_hasta])->orderBy('libro_investigacion.created_at',$this->libro_inv->orden)->paginate($this->libro_inv->mostrar);    
                 break;
            case "Autor":
				$libro_inv_lists=$this->libro_inv->whereHas('invautores',function($q){$q->whereHas('autor', function($q) { $q->where(\DB::raw('concat(autor.nombre," ",autor.apellido)'), 'LIKE','%'.$this->libro_inv->palabra_clave.'%'); });})->where('categoria','=',$this->libro_inv->tipo)->whereBetween('año', [$this->libro_inv->año_desde, $this->libro_inv->año_hasta])->orderBy('created_at',$this->libro_inv->orden)->paginate($this->libro_inv->mostrar);
                break;
            default:             
        }   
       return view('sites.libroinv.search-view',compact('ajustes','areas','libro_inv','libro_inv_lists','libro_inv_years','count_all'));
    }
  protected function document_view($id){
         if (Auth::guard('webregister')->check()){
           $libroinv=$this->libro_inv->findOrFail($id);
	       $ajustes=$this->ajustes;
		   $areas=$this->area->all();
           return view('sites.libroinv.document_view',compact('libroinv','ajustes','areas'));
         }else{
           return redirect()->back();
         }
  	
  }

  protected $ajustes,$area;
  protected $libro_inv;
}

