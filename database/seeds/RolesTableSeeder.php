<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([ 
            ['role_name' => 'Administrator', 'role_description' => 'Administrator'],
            ['role_name' => 'Registrar', 'role_description' => 'Registrar'],
        ]);
    }
}
