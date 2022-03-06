<?php

use Illuminate\Database\Seeder;
use App\Models\facultad;

class CarreraTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	$facultad=new Facultad();
    	$fac_ing=$facultad->where('facultad','=','Ingeniería')->get()->first();
    	$fac_med=$facultad->where('facultad','=','Medicina')->get()->first();
    	$fac_cyt=$facultad->where('facultad','=','Ciencias y Tecnologías')->get()->first();
    	$fac_facea=$facultad->where('facultad','=','Ciencias Económicas y Administrativas')->get()->first();
    	$fac_hum=$facultad->where('facultad','=','Humanidades')->get()->first();
    	$fac_der=$facultad->where('facultad','=','Ciencias Jurídicas')->get()->first();
    	$fac_caf=$facultad->where('facultad','=','Ciencias Agropecuarias y Forestales')->get()->first();

        $items = array(
         array(
         	  'carrera'  => "Ing. en Informática", 
         	   'facultad_id'=>$fac_ing->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
         array( 
              'carrera'  => "Ing. Civil", 
         	   'facultad_id'=>$fac_ing->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
         array( 
              'carrera'  => "Ing. Electromécanica", 
         	   'facultad_id'=>$fac_ing->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
             'carrera'  => "Medicina", 
         	  'facultad_id'=>$fac_med->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'carrera'  => "Lic. en Electrónica", 
         	  'facultad_id'=>$fac_cyt->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'carrera'  => "Lic. en Informática Empresarial", 
         	  'facultad_id'=>$fac_cyt->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'carrera'  => "Ing. Ambiental", 
         	  'facultad_id'=>$fac_cyt->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'carrera'  => "Ing. Alimentos", 
         	  'facultad_id'=>$fac_cyt->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'carrera'  => "Ing. Comercial", 
         	  'facultad_id'=>$fac_facea->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
             array( 
              'carrera'  => "Lic. Ciencias Contables", 
         	  'facultad_id'=>$fac_facea->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
              array( 
              'carrera'  => "Lic. en Administracción", 
         	  'facultad_id'=>$fac_facea->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'carrera'  => "Lic. en Administracción", 
         	  'facultad_id'=>$fac_facea->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
           array( 
            'carrera'  => "Lic en Bilinguismo", 
            'facultad_id'=>$fac_hum->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
           array( 
            'carrera'  => "Lic. en Lengua Inglesa", 
            'facultad_id'=>$fac_hum->id,
               'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
           array( 
            'carrera'  => "Lic. en Ciencias Sociales", 
            'facultad_id'=>$fac_hum->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
           array( 
            'carrera'  => "Lic. en Ciencias Básicas", 
            'facultad_id'=>$fac_hum->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
            array( 
            'carrera'  => "Lic. en Matemática", 
            'facultad_id'=>$fac_hum->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
           array( 
            'carrera'  => "Lic. en Ciencias de la Educación", 
            'facultad_id'=>$fac_hum->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
           array( 
            'carrera'  => "Lic. en Psicología Clínica", 
            'facultad_id'=>$fac_hum->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
            array( 
            'carrera'  => "Ciencias Jurídicas", 
            'facultad_id'=>$fac_der->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
            array( 
            'carrera'  => "Ing. Agropecuaria", 
            'facultad_id'=>$fac_caf->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),
             array( 
            'carrera'  => "Lic. en Administración de Cooperativas", 
            'facultad_id'=>$fac_caf->id,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
            ),

         );
         DB::table('carrera')->insert($items);
    }
}
