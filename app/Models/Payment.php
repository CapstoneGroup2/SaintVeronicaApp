<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'student_id',
        'total_payables',
        'amount_paid',
        'balance_due',
        'created_at',
        'updated_at'
    ];

    public function student() {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
