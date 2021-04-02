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
        // DB::table('students')->insert([ 
        //     'id' => 10000000,
        //     'student_first_name' => 'Josephine',
        //     'student_middle_name' => 'Pardillo',
        //     'student_last_name' => 'Morre',
        //     'student_image' => 'default.png',
        //     'student_email' => 'josephine.morre@gmail.com',
        //     'student_home_contact' => '+639123456789',
        //     'student_address' => 'Cogon, Compostela, Cebu',
        //     'student_gender' => 'F',
        //     'student_age' => 10,
        //     'student_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
        //     'student_status' => 'Single',
        //     'student_active_status' => 1,
        //     'created_at' => date('Y-m-d'),
        //     'updated_at' => date('Y-m-d'),
        // ]);

        factory(App\Models\Student::class, 100)->create();

    }
}
