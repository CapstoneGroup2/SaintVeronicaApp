<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            'role_id'   =>  1,
            'user_first_name' => 'Josephine',
            'user_last_name' => 'Morre',
            'user_image' => 'default.png',
            'user_email' => 'admin@admin.com',
            'user_contact'  => '0912-345-6789',
            'password' => bcrypt('admin'),
            'user_active_status' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        DB::table('users')->insert([ 
            'role_id'   =>  2,
            'user_first_name' => 'Josephine',
            'user_last_name' => 'Morre',
            'user_image' => 'default.png',
            'user_email' => 'registrar@registrar.com',
            'user_contact'  => '0912-345-6789',
            'password' => bcrypt('registrar'),
            'user_active_status' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
    }
}
