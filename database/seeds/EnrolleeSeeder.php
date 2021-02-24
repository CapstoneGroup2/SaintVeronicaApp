<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnrolleeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollees')->insert([
            'id' => 100000,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Male',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);
        DB::table('enrollees')->insert([
            'id' => 100001,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Female',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);
        DB::table('enrollees')->insert([
            'id' => 100002,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Female',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);
        DB::table('enrollees')->insert([
            'id' => 100003,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Female',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);
        DB::table('enrollees')->insert([
            'id' => 100004,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Female',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);
        DB::table('enrollees')->insert([
            'id' => 100005,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Male',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);

        DB::table('enrollees')->insert([
            'id' => 100006,
            'enrollee_first_name' => Str::random(5),
            'enrollee_middle_name' => Str::random(5),
            'enrollee_last_name' => Str::random(5),
            'enrollee_email' => Str::random(5).'@gmail.com',
            'enrollee_address' => Str::random(10),
            'enrollee_gender' => 'Female',
            'enrollee_age' => 10,
            'enrollee_birth_date' => date('Y-m-d', strtotime('11/13/2010')),
            'enrollee_status' => 'Single',
            'enrollee_active_status' => 1,
            'created_at' => date('Y-m-d')
        ]);
    }
}
