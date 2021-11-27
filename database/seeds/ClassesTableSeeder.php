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
            ['class' => 'Nursery'],
            ['class' => 'Nursery 2'],
            ['class' => 'Kinder 1'],
            ['class' => 'Kinder 2'],
            ['class' => 'Grade 1'],
            ['class' => 'Grade 2'],
            ['class' => 'Grade 3'],
            ['class' => 'Grade 4'],
            ['class' => 'Grade 5'],
            ['class' => 'Grade 6'],
            ['class' => 'Grade 7'],
            ['class' => 'Grade 8'],
            ['class' => 'Grade 9'],
            ['class' => 'Grade 10'],
            ['class' => 'Grade 11'],
            ['class' => 'Grade 12'],
            ['class' => 'Piano Lesson'],
            ['class' => 'Voice Lesson']
        ]);
    }
}
