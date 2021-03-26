<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([ 
            ['class_name' => 'Nursery', 'class_description' => 'Nursery'],
            ['class_name' => 'Nursery 2', 'class_description' => 'Nursery 2'],
            ['class_name' => 'Kinder 1', 'class_description' => 'Kinder 1'],
            ['class_name' => 'Kinder 2', 'class_description' => 'Kinder 2'],
        ]);
    }
}
