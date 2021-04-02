<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class StudentsClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 10000000; $i <= 10000100; $i++) 
        {
            DB::table('students_classes')->insert([ 
                'student_id'    => $i,
                'class_id'      => rand(1, 4),
            ]);
        }
    }
}
