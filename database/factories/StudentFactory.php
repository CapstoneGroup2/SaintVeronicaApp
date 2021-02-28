<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'grade_level_id'        => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
        'tutorial_id'           => $faker->randomElement([1, 2, 3]),
        'student_first_name'    => $faker->firstName,
        'student_middle_name'   => $faker->lastName,
        'student_first_name'    => $faker->lastName,
        'student_email'         => $faker->unique()->safeEmail,
        'student_home_contact'  => $faker->phoneNumber,
        'student_address'       => $faker->address,
        'student_age'           => $faker->numberBetween($min = 3, $max = 20),
        'student_birth_date'    => $faker->dateTimeBetween('-10 years', 'now'),
        'student_gender'        => $faker->randomElement(['M', 'F']),
        'student_status'        => $faker->randomElement(['Single', 'Married ']),
        'student_active_status' => $faker->randomElement([1, 0]),
        'created_at'            => $faker->dateTime('now'),
        'updated_at'            => $faker->dateTime('now')
    ];
});
