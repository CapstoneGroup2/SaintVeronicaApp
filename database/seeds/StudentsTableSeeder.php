<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([ 
            'id' => 100000,
            'student_first_name' => Str::random(5),
            'student_middle_name' => Str::random(5),
            'student_last_name' => Str::random(5),
            'student_email' => Str::random(5).'@gmail.com',
            'student_home_contact' => '+639123456789',
            'student_address' => Str::random(10),
            'student_gender' => 'Male',
            'student_age' => 10,
            'student_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'student_status' => 'Single',
            'student_active_status' => 0,
            'created_at' => date('Y-m-d')
        ]);
    }
}
