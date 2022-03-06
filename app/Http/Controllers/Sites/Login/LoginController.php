<?php
namespace App\Http\Controllers\Sites\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Sessions\SessionsController;
class LoginController extends Controller{
    public function __construct(){
    }
     protected function postLogin(Request $request){
        $username = $request->input('username');
         $password = $request->input('password');
		 if ($request->ajax()){
			 if (Auth::guard('webregister')->attempt(['username' => $username, 'password' => $password])) {
		                echo 1;
		      }else{
	            
	            	echo 0;
	        }
		 }
    }
    protected function getLogout(){
        Auth::guard('webregister')->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/sites');

    }
}
