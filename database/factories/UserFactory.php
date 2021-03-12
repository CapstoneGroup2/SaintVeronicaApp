<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_role_id'       => $faker->randomElement([1, 2]),
        'user_first_name'    => $faker->firstName,
        'user_middle_name'   => $faker->lastName,
        'user_last_name'     => $faker->lastName,
        'user_email'         => $faker->unique()->safeEmail,
        'password'           => bcrypt('password'),
        'user_contact'       => $faker->phoneNumber,
        'user_address'       => $faker->address,
        // 'user_age'           => $faker->numberBetween($min = 3, $max = 20),
        // 'user_birth_date'    => $faker->dateTimeBetween('-10 years', 'now'),
        'user_gender'        => $faker->randomElement(['M', 'F']),
        'user_status'        => $faker->randomElement(['Single', 'Married ']),
        'user_active_status' => $faker->randomElement([1, 0]),
        'created_at'         => $faker->dateTime('now'),
        'updated_at'         => $faker->dateTime('now')
    ];
});
