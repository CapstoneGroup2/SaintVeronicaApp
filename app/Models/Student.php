<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey= 'id';
    
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
    'student_mother_name',
    'student_mother_contact_number',
    'student_father_name',
    'student_father_contact_number',
    'student_guardian_name',
    'student_guardian_contact_number',
    'created_at',
    'updated_at'
    ];

    public function classes() {
        return $this->belongsToMany(Classes::class, 'students_classes', 'student_id', 'class_id');
    }
}
