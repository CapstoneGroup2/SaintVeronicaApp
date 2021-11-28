<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    protected $primaryKey= 'id';

    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'contact',
        'address',
        'gender',
        'status',
        'active_status',
        'created_at',
        'updated_at'
        ];

    protected $hidden = [
        'password',
        'email_verified_at'
    ];

    public function role() {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\CustomVerifyEmailQueued);
    }
}
