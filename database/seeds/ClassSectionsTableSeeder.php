<?php

use Illuminate\Database\Seeder;

class ClassSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_sections')->insert([ 
            ['section' => "Apple", 'class_id' => 1],
            ['section' => "Apple", 'class_id' => 2],
            ['section' => "Apple", 'class_id' => 3],
            ['section' => "Apple", 'class_id' => 4],
            ['section' => "Apple", 'class_id' => 5],
            ['section' => "Apple", 'class_id' => 6],
            ['section' => "Apple", 'class_id' => 7],
            ['section' => "Apple", 'class_id' => 8],
            ['section' => "Apple", 'class_id' => 9],
            ['section' => "Apple", 'class_id' => 10],
            ['section' => "Apple", 'class_id' => 11],
            ['section' => "Apple", 'class_id' => 12],
            ['section' => "Apple", 'class_id' => 13],
            ['section' => "Apple", 'class_id' => 14],
            ['section' => "Apple", 'class_id' => 15],
            ['section' => "Apple", 'class_id' => 16],
        ]);
    }
}
