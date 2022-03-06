<?php
namespace App\Http\Controllers\Sites\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Services\EmailService;
use App\Models\ajustes;
use App\Models\area;
class RegistrationController extends Controller{
     public function __construct(){
     	$ajustes=new Ajustes();
		$this->area=new Area();
     	$this->ajustes=$ajustes->findOrFail($ajustes->first()->id);
	}
    protected function nuevo(){
    	$ajustes=$this->ajustes;
		$areas=$this->area->all();
    	return view('sites.other-pages.registration.new',compact('ajustes','areas'));
    }
	protected function sendRegistrationForm(Request $request){
	     $ajustes=$this->ajustes;
	  	 $from=$request->input('nombre');
		 $apellido=$request->input('apellido');
	     $email=$request->input('email');
		 $organizacion=$request->input('organizacion');
		 $ocupacion=$request->input('ocupacion');
		 $to=$ajustes->mail_to;
		 $subject="Formulario de Solicitud de Registro";
		 $cuerpo="Nombre y Apellido: ".$from." ".$apellido."</br>";
	     $cuerpo.="Email: ".$email."</br>";
	     $cuerpo.="Organización: ".$organizacion."</br>";
	     $cuerpo.="Ocupación: ".$ocupacion."</br>";
		 $cuerpo.="Se ha enviado el formulario desde el Sitio Web del Repositorio de la UNI";
	  	 $emailService=new EmailService();
		 $emailService->send($from,$to,$subject,$cuerpo);
		 Session::flash('succesfull_message','Se ha enviado correctamente el Formulario de Registro');
         return redirect()->route('registration.new');
	}
  protected $ajustes,$area;
}
