<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiscellaneousAndOtherFees extends Model
{
    protected $fillable = [
        'class_id',
        'item_code',
        'item_description',
        'item_price',
        'item_image',
        'created_at',
        'updated_at'
        ];
    
        protected function class() 
        {
            return $this->hasOne(Classes::class, 'id', 'classes_id');
        }
}
