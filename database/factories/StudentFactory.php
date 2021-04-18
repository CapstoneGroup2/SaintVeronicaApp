<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'student_image'         => 'default.png',
        'student_first_name'    => $faker->firstName,
        'student_middle_name'   => $faker->lastName,
        'student_last_name'     => $faker->lastName,
        'student_email'         => $faker->unique()->safeEmail,
        'student_home_contact'  => $faker->phoneNumber,
        'student_address'       => $faker->address,
        'student_age'           => $faker->numberBetween($min = 3, $max = 20),
        'student_birth_date'    => $faker->dateTimeBetween('-10 years', 'now'),
        'student_gender'        => $faker->randomElement(['Male', 'Female']),
        'student_mother_name'   => $faker->name,
        'student_mother_contact_number' =>  $faker->phoneNumber,
        'student_father_name'   => $faker->name,
        'student_father_contact_number' =>  $faker->phoneNumber,
        'student_guardian_name'   => $faker->name,
        'student_guardian_contact_number' =>  $faker->phoneNumber,
        'created_at'            => $faker->dateTime('now'),
        'updated_at'            => $faker->dateTime('now')
    ];
});
