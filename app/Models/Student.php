<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey= 'id';
    
    protected $fillable = [
    'first_name',
    'middle_name',
    'last_name',
    'email',
    'home_contact',
    'address',
    'gender',
    'age',
    'birth_date',
    'status',
    'mother_name',
    'mother_contact_number',
    'father_name',
    'father_contact_number',
    'guardian_name',
    'guardian_contact_number',
    'created_at',
    'updated_at'
    ];

    public function classes() {
        return $this->belongsToMany(Classes::class, 'students_classes', 'student_id', 'class_id');
    }
}
