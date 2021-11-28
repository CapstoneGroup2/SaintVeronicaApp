<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'class',
    ];
    
    public function students() {
        return $this->belongsToMany(Student::class,'students_classes', 'class_id', 'student_id');
    }
}
