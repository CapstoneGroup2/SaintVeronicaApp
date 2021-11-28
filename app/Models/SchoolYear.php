<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'school_year',
    ];
    
}
