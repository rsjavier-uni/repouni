<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $items = array(
         array(
         	  'name'  => "Super Usuario", 
         	  'slug'=>"superuser",
              'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
         array( 
              'name'  => "Administrador", 
         	  'slug'=>"admin",
              'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            )
         );
         DB::table('roles')->insert($items);
    }
}
