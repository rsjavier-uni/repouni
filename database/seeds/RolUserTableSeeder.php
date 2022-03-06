<?php

use Illuminate\Database\Seeder;

class RolUserTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $items = array(
            array(
         	  'user_id'  => "1", 
         	  'role_id'=>"1",
              'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'user_id'  => "4", 
         	  'role_id'=>"1",
              'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            ),
            array( 
              'user_id'  => "5", 
         	  'role_id'=>"1",
              'created_at' => new \Carbon\Carbon,
              'updated_at' => new \Carbon\Carbon
            )
         );
         DB::table('role_user')->insert($items);
    }
}
