<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'user_role_name'     => 'Administrator',
            'created_at'         => date('Y-m-d'),
            'updated_at'         => date('Y-m-d')
        ]);
        
        DB::table('user_roles')->insert([
            'user_role_name'     => 'Registrar',
            'created_at'         => date('Y-m-d'),
            'updated_at'         => date('Y-m-d')
        ]);
    }
}
