<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $primaryKey= 'id';
        
    protected $fillable = [
        'announcement_title',
        'announcement_message',
        'created_at',
        'updated_at'
    ];
}
