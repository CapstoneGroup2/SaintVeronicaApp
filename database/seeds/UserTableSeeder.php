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
            'user_first_name' => 'Admin',
            'user_last_name' => 'Admin',
            'user_image' => 'default.png',
            'user_email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'user_contact'  => '0912-345-6789',
            'password' => bcrypt('Admin@123'),
            'user_active_status' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        DB::table('users')->insert([ 
            'role_id'   =>  2,
            'user_first_name' => 'Registrar',
            'user_last_name' => 'Registrar',
            'user_image' => 'default.png',
            'user_email' => 'registrar@registrar.com',
            'email_verified_at' => now(),
            'user_contact'  => '0912-345-6789',
            'password' => bcrypt('Registrar@123'),
            'user_active_status' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
    }
}
