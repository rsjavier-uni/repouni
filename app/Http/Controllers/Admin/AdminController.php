<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
Class AdminController extends Controller{
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
    protected function admin(){
        $current_usuario=$this->current_usuario;
    	return view('admin.admin.admin',compact('current_usuario'));
    }
    var $usuario;
    var $current_usuario;
    var $facultad;
}

