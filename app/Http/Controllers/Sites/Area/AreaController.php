<?php
namespace App\Http\Controllers\Sites\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\ajustes;
use App\Models\libroinvestigacion;
use App\Models\area;
class areaController extends Controller{
     public function __construct(){
     	$ajustes=new Ajustes();
     	$this->ajustes=$ajustes->findOrFail($ajustes->first()->id);
	}
    protected function areaPage($id){
    	$ajustes=$this->ajustes;
		$area=new Area();
		$area->area_id=$id;
		$areas=$area->all();
	    $areas_collect = [''=>'-- Seleccione --']+$area->all(['area','id'])->pluck('area', 'id')->toArray();
		$libroinv=new LibroInvestigacion();
		$libro_inv_lists=$libroinv->where('area_id','=',$id)->paginate(8);
    	return view('sites.area.area-view',compact('ajustes','libro_inv_lists','area','areas','areas_collect'));
    }
  protected $ajustes;
}
