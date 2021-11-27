<?php

use Illuminate\Database\Seeder;

class SchoolYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_year')->insert([ 
            ['school_year' => '2018'],
            ['school_year' => '2019'],
            ['school_year' => '2020']
        ]);
    }
}
