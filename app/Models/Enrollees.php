<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollees extends Model
{
    
    protected $fillable = [
    'enrollee_first_name',
    'enrollee_middle_name',
    'enrollee_last_name',
    'enrollee_email',
    'enrollee_address',
    'enrollee_gender',
    'enrollee_age',
    'enrollee_birth_date',
    'enrollee_status',
    'enrollee_active_status'
    ];

    protected $hidden = [
    'created_at', 'updated_at',
    ];
}
