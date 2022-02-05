<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'class_id',
        'section'
    ];
    
    public function class() {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }
}
