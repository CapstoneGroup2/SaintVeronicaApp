<?php

use Illuminate\Database\Seeder;

class TutorialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutorials')->insert([
            'tutorial_name'     => 'No Tutorial'
        ]);

        DB::table('tutorials')->insert([
            'tutorial_name'     => 'Piano Tutorial'
        ]);

        DB::table('tutorials')->insert([
            'tutorial_name'     => 'Music Tutorial'
        ]);
    }
}
