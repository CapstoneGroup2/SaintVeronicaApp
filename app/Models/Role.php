<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'role_name',
        'role_description'
    ];
    
    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions', 'role_id', 'permission_id');
    }
}
