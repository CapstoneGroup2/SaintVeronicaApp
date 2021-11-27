<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([ 
            ['code' => 'MTF-28909-01', 'item' => 'Monthly Tuition for Grade 1', 'price' => 1000],
            ['code' => 'MTF-28909-02', 'item' => 'Monthly Tuition for Grade 2', 'price' => 1000],
            ['code' => 'MTF-28909-03', 'item' => 'Monthly Tuition for Grade 3', 'price' => 1000],
            ['code' => 'MTF-28909-04', 'item' => 'Monthly Tuition for Grade 4', 'price' => 1000],
            ['code' => 'MTF-28909-05', 'item' => 'Monthly Tuition for Grade 5', 'price' => 1000],
            ['code' => 'MTF-28909-06', 'item' => 'Monthly Tuition for Grade 6', 'price' => 1000],
            ['code' => 'BK-2007-01', 'item' => 'Math Book for Grade 1', 'price' => 500],
            ['code' => 'ID-348790-20', 'item' => 'ID', 'price' => 300],
            ['code' => 'UNF-10029-19', 'item' => 'Uniform for Nursery 1', 'price' => 400],
            ['code' => 'ENRL-68009-02', 'item' => 'Enrollment', 'price' => 200],
            ['code' => 'PEUN-89007-11', 'item' => 'PE Uniform for Nursery 1', 'price' => 400],
        ]);
    }
}
