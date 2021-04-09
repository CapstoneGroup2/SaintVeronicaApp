<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $primaryKey= 'id';
        
    protected $fillable = [
        'announcement_title',
        'announcement_message',
        'is_approved',
        'date_approved',
        'created_at',
        'updated_at'
    ];
}
