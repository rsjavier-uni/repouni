<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = array(
            array(
              'facultad'  => "Ingeniería", 
              'created_at' => new \Carbon\Carbon,
             'updated_at' => new \Carbon\Carbon
            ),
            array( 
                'facultad'  => "Medicina",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
            ),
            array( 
                'facultad'  => "Ciencias y Tecnología",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
            ),
            array( 
                'facultad'  => "Ciencias Económicas y Administrativas",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
            ),
            array( 
                'facultad'  => "Humanidades",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
            ),
            array( 
                'facultad'  => "Ciencias Jurídicas",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
            ),
            array( 
                'facultad'  => "Ciencias Agropecuarias y Forestales",
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
            )

        );
        DB::table('facultad')->insert($items);
    }
}
