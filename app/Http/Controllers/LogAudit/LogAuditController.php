<?php

namespace App\Http\Controllers\LogAudit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajustes\AjustesController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\log_audit;

class LogAuditController extends Controller{
     public function __construct(){
      $this->middleware(function ($request, $next) {
        if (Auth::check()){
          $this->current_usuario = Auth::user();
		  $this->user=new User();
		  $this->user_all = [''=>'-- Usuario --']+$this->user->all(['username','username'])->pluck('username', 'username')->toArray();
	      $this->ajustes_cont=new AjustesController();
          return $next($request);
        }else{
           return redirect()->route('auth.logout');
        }
      });
    }
    protected function view(){
         $log_audit=new Log_Audit();
		 $users=$this->user_all;
         $logs_audits=$log_audit->orderBy('created_at', 'DESC')->paginate($this->ajustes_cont->getElementPerPage()); 
 
         $current_usuario=$this->current_usuario;
         return view('admin.logs-audits.logs-audits-view',compact('logs_audits','users','current_usuario'));
    }
	protected function search(Request $request){
		$log_audit = new Log_Audit(); 
        $log_audit->username = $request->input('username');
        $log_audit->entidad = $request->input('entidad');
        $log_audit->orden = $request->input('orden');
        $logs_audits= $log_audit->whereHas('user', function($q) use($log_audit){ $q->where('username', 'LIKE','%'.$log_audit->username.'%'); })->where('auditable_type', '=', $log_audit->entidad)->orderBy('created_at', $log_audit->orden)->paginate($this->ajustes_cont->getElementPerPage());
        $current_usuario=$this->current_usuario;
		$users=$this->user_all;
        return view('admin.logs-audits.logs-audits-view',compact('logs_audits','log_audit','users','current_usuario'));
		
	}
	protected function destroyAll(){ 
		\DB::table('audits')->delete();
		return redirect()->route('logs.audits');
	}
   var $current_usuario,$ajustes_cont;
   var $user_all,$user;
}
