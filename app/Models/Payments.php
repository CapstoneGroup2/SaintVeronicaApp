<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'student_id',
        'total_amount_payable',
        'total_amount_paid',
        'total_amount_due',
        'created_at',
        'updated_at'
    ];

    public function student() {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
