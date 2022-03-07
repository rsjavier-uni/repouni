<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AjustesSeeder extends Seeder
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
                'titulo_sitio'  => "Repositorio UNI", 
                'logo_url'  => "public/assets/images/logo.png",
                'path_img_upload'  => "public/assets/img/", 
                'path_document_upload'  => "public/assets/documentos",
                'elements_per_page'  => 8,  
                'created_at' => new \Carbon\Carbon,
                'updated_at' => new \Carbon\Carbon
           )

        );
        DB::table('ajustes')->insert($items);
    }
}
