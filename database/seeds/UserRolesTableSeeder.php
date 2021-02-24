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
            'user_roles'     => 'admin',
        ]);
        
        DB::table('user_roles')->insert([
            'user_roles'     => 'registrar',
        ]);
    }
}
