<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $fillable = [
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
    'enrollee_active_status',
    'created_at'
    ];

    protected $hidden = [
    'created_at', 'updated_at',
    ];
}
