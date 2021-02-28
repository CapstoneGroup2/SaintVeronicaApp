<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserRolesTableSeeder::class,
            GradeLevelsTableSeeder::class,
            // StudentsTableSeeder::class,
            // UserTableSeeder::class,
            // TutorialsTableSeeder::class
        ]);
    }
}
