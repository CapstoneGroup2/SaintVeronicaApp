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
            'roles'     => 'admin',
        ]);
        
        DB::table('user_roles')->insert([
            'roles'     => 'registrar',
        ]);
        
        DB::table('user_roles')->insert([
            'roles'     => 'teacher',
        ]);
    }
}
