<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'subjects'     => 'Christian Living Education (CLE)',
        ]);
        
        DB::table('subjects')->insert([
            'subjects'     => 'English',
        ]);
        
        DB::table('subjects')->insert([
            'subjects'     => 'Math',
        ]);
        
        DB::table('subjects')->insert([
            'subjects'     => 'Filipino',
        ]);
        
        DB::table('subjects')->insert([
            'subjects'     => 'Education',
        ]);
    }
}
