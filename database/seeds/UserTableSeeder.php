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
            'user_role_id' => 1,
            'user_first_name' => 'Josephine',
            'user_middle_name' => 'Pardillo',
            'user_last_name' => 'Morre',
            'user_email' => 'josephine.morre@gmail.com',
            'password'      => bcrypt('password'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        // factory(App\Models\User::class, 20)->create();
    }
}
