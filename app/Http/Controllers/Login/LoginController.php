<?php
namespace App\Http\Controllers\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Sessions\SessionsController;
class LoginController extends Controller{
    public function __construct(){
    }
    public function login(){
        return view('admin.login.login');   
    }
     protected function postLogin(Request $request){
        $username = $request->input('username');
         $password = $request->input('password');
         if (Auth::guard('web')->attempt(['username' => $username, 'password' => $password])) {
                return redirect()->intended($this->redirectPath());
         }else{
           
              return redirect($this->loginPath())->withErrors([
                 Config::get('admin.login.login') => $this->getFailedLoginMessage(),
            ]);
        }
    }
    protected function getLogout(){
        Auth::guard('web')->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/login');

    }
    private function getCredentials(LoginUsuarioRequest $request) {
 
        return $request->only(Config::get('admin.login.login'), 'password');
    }
    private function loginPath() {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }
     private function redirectPath() {

        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin';
    }
    protected function getFailedLoginMessage(){
        return trans('passwords.invalid_credentials');
    }
}
