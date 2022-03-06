<?php



namespace App\Http\Services;

class ArrayService{

     public function __construct(){

	}

    public function member($elem,$array_elem){
		 return array_search($elem,$array_elem,false);
    }
   public function createIntervalNumberArray($min,$max){
   	$array_interval=array();
	for($i=$min;$i<=$max;$i++){
		$array_interval=array_add($array_interval,$i,$i);	
	}
	return $array_interval;
   }
   public function joinArray($array1,$array2){
   	 $join_array=array();
   	 for($i=0;$i<count($array1);$i++){
   	 	 $join_array[$i]=$array1[$i].$array2[$i];
   	 }   
	 return $join_array;	
   }
}
?>