<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentsClasses extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'student_id',
        'class_id'
    ];
}
