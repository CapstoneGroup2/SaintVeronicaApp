<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiscellaneousAndOtherFees extends Model
{
    protected $fillable = [
        'grade_level_id',
        'tutorial_id',
        'miscellaneous_and_other_fee_name',
        'miscellaneous_and_other_fee_description',
        'miscellaneous_and_other_fee_price',
        'miscellaneous_and_other_fee_image',
        'created_at',
        'updated_at'
        ];
    
        protected function gradeLevel() 
        {
            return $this->hasOne(GradeLevel::class, 'id', 'grade_level_id');
        }
    
        protected function tutorial()
        {
            return $this->hasOne(Tutorial::class, 'id', 'tutorial_id');
        }
}
