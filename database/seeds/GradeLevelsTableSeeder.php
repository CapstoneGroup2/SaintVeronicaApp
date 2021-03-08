<?php

use Illuminate\Database\Seeder;

class GradeLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'No Grade Level'
        ]);

        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Nursery'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Nursery 2'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Kinder 1'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Kinder 2'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Grade 1'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Grade 2'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Grade 3'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Grade 4'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Grade 5'
        ]);
        
        DB::table('grade_levels')->insert([
            'grade_level_name'     => 'Grade 6'
        ]);
    }
}
