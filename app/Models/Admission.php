<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'student_id',
        'school_year_id',
        'class_section_id',
        'admission_date'
    ];
    
    protected function student() 
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
    
    protected function school_year() 
    {
        return $this->hasOne(SchoolYear::class, 'id', 'school_year_id');
    }
    
    protected function class_section() 
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
