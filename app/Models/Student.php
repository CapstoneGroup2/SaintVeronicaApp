<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey= 'id';
    
    protected $fillable = [
    'grade_level_id',
    'tutorial_id'.
    'student_first_name',
    'student_middle_name',
    'student_last_name',
    'student_email',
    'student_home_contact',
    'student_address',
    'student_gender',
    'student_age',
    'student_birth_date',
    'student_status',
    'student_active_status',
    'created_at',
    'updated_at'
    ];

    protected function gradeLevel() 
    {
        return $this->hasOne(GradeLevel::class, 'id', 'grade_level_id');
    }

    protected function tutorial()
    {
        return $this->hasOne(Tutorial::class, 'id', 'tutorial_id');
    }
}
