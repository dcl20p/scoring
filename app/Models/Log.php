<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    const USER_TYPE_ADMIN = "ADMIN";
    const USER_TYPE_SUPER_ADMIN = "SUPER_ADMIN";
    const USER_TYPE_TEACHER = "TEACHER";
    const USER_TYPE_STUDENT = "STUDENT";
    const USER_TYPE_GUEST = "GUEST";

    protected $fillable = [
        'level',
        'message',
        'context',
        'extra',
        'user_id',
        'user_type',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'context' => 'array',
        'extra' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
