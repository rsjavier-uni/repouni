<?php

namespace App\Http\Controllers\Sessions;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\sessions;
class SessionsController extends Controller{
    public function __construct(){
    	
	}
    public function currentSessions(){
       
    }
    public function create($user_id){
    	 $session = new Sessions();
          $session->user_id=$user_id;
          $session->ip_address = \Request::ip();
          $session->user_agent=\Request::server('HTTP_USER_AGENT');
          $session->last_activity=Carbon::now();
          $session->save();
    }
    public function update($id,$user_id,$in_session){
          $session = new Sessions();
          $session=$session->findOrFail($id);
          $session->user_id=$user_id;
          $session->ip_address = \Request::ip();
          $session->user_agent=\Request::server('HTTP_USER_AGENT');
          $session->in_session=$in_session;
          $session->last_activity=Carbon::now();
          $session->save();
    }
  public function getSessionByUser($user_id){
  	  $session = new Sessions();
	  return $session->where('user_id',$user_id)->first();
  }
  public function currentUserInSession($user_id){
  	  $session = new Sessions();
	  $session=$session->where('user_id',$user_id);
	  if ($session->count()==0){
	  	 return false;
	  }else{
	  	return true;
	  }
  }
}
