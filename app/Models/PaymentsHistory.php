<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentsHistory extends Model
{
    protected $primaryKey= 'id';

    protected $fillable = [
        'student_id',
        'user_id',
        'amount_paid',
        'date_paid'
    ];

    public function student() {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
