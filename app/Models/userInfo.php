<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'image',
        'phone',
        'address',
        'skill',
        'fb',
        'linkedin',
        'student_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
