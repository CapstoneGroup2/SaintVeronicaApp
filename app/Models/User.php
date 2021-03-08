<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey= 'id';

    protected $table = 'users';

    protected $fillable = [
        'user_role_id',
        'user_first_name',
        'user_middle_name',
        'user_last_name',
        'user_email',
        'password',
        'user_contact',
        'user_address',
        'user_gender',
        'user_status',
        'user_active_status',
        'created_at',
        'updated_at'
        ];

    public function userRole() 
    {
        return $this->hasOne(UserRole::class, 'id', 'user_role_id');
    }
}
