<?php



namespace App\Http\Services;

class EmailService{

     public function __construct(){

	}

    public function send($from,$to,$subject,$cuerpo){
      $headers="From:".$from."\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      mail($to,$subject,$cuerpo,$headers);
	  echo 1;
    }

}
?>