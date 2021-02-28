<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $primaryKey= 'id';

    protected $fillable= [
        'user_role_name',
        'created_at',
        'updated_at'
    ];

    public function users() 
    {
        return $this->belongsto(User::class);
    }
}
