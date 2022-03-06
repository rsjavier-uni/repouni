<?php

namespace App\Http\Controllers\Sites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\libroinvestigacion;
use App\Http\Services\ArrayService;
use App\Http\Services\EmailService;
use App\Models\ajustes;
use App\Models\facultad;
use App\Models\libroinvestigacionautor;
use App\Models\area;
class SitesController extends Controller{
    public function __construct(){
       $ajustes=new Ajustes();
	   $this->area=new Area();
	   $this->areas = [''=>'-- Seleccione --']+$this->area->orderBy('area','asc')->pluck('area', 'area')->toArray();
       $this->ajustes=$ajustes->findOrFail($ajustes->first()->id);   
	   $this->libro_inv=new LibroInvestigacion();
    }
    protected function sites(){
          $this->facultad=new Facultad();
		  $arrayService=new ArrayService();
          $ajustes=$this->ajustes;
          $facultades=$this->facultad->get();
		  $areas=$this->area->orderBy('area','asc')->get();
          $libro_inv_lists=$this->libro_inv->orderBy('created_at', 'desc')->paginate(7);
		  $libro_inv_min_year=$this->libro_inv->min('año');
		  $libro_inv_max_year=$this->libro_inv->max('año');
		  $libro_inv_years=$arrayService->createIntervalNumberArray($libro_inv_min_year,$libro_inv_max_year);
          return view('sites.home.home',compact('ajustes','libro_inv_lists','libro_inv_years','facultades','areas'));
    }
  public function findByYearsLists($year){
  	$arrayService=new ArrayService();
  	$ajustes=$this->ajustes;
	$areas=$this->area->all();
	$libro_inv=$this->libro_inv;
	$libro_inv->año=$year;
	$libro_inv_min_year=$this->libro_inv->min('año');
    $libro_inv_max_year=$this->libro_inv->max('año');
    $libro_inv_years=$arrayService->createIntervalNumberArray($libro_inv_min_year,$libro_inv_max_year);
	$libro_inv_lists =$this->libro_inv->where('año',$year)->paginate(8);
	 return view('sites.libroinv.lists-by-years',compact('ajustes','libro_inv','libro_inv_lists','year','libro_inv_years','areas'));
  }
  protected function aboutUs(){
  	$ajustes=$this->ajustes;
	$areas=$this->area->all();
  	return view('sites.other-pages.about-us',compact('ajustes','areas'));
  }
  public function contactPage(){
  	$ajustes=$this->ajustes;
	$areas=$this->area->all();
	return view('sites.other-pages.contact-page',compact('ajustes','areas'));
  }
  public function sendContactForm(Request $request){
  	$ajustes=$this->ajustes;
  	 $from=$request->input('nombre');
     $email=$request->input('email');
	 $subject=$request->input('asunto');
	 $message=$request->input('mensaje');
	 $to=$ajustes->mail_to;
	 $cuerpo="Nombre y Apellido: ".$from."</br>";
     $cuerpo.="Email: ".$email."</br>";
     $cuerpo.="Asunto: ".$subject."</br>";
     $cuerpo.="Mensaje: ".$mensaje."</br>";
	 $cuerpo.="Se ha enviado el formulario desde el Sitio Web del Repositorio de la UNI";
  	 $emailService=new EmailService();
	 $emailService->send($from,$to,$subject,$cuerpo);
  }
  protected $ajustes;
  protected $facultad;
  protected $libro_inv;
  protected $area,$areas;
}

