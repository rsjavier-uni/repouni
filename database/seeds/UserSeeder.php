<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'superadmin',
            'password' => Hash::make("secret"),
            // 'password' => bcrypt('secret'),
            'role_id' => 1,
            'created_at' => new \Carbon\Carbon,
            'updated_at' => new \Carbon\Carbon
        ]);
    }
}
