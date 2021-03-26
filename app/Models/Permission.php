<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'name',
        'key',
        'controller',
        'method',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class,'permissions_roles', 'permission_id', 'role_id');
    }
}
