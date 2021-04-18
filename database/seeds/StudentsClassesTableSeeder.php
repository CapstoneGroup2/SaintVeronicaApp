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
        DB::table('students_classes')->insert([ 
            'student_id'    => 10000000,
            'class_id'      => 1,
        ]);
    }
}
