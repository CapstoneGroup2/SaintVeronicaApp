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
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'contact'  => '0912-345-6789',
            'password' => bcrypt('Admin@123'),
            'active_status' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        DB::table('users')->insert([ 
            'role_id'   =>  2,
            'first_name' => 'Registrar',
            'last_name' => 'Registrar',
            'email' => 'registrar@registrar.com',
            'email_verified_at' => now(),
            'contact'  => '0912-345-6789',
            'password' => bcrypt('Registrar@123'),
            'active_status' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
    }
}
