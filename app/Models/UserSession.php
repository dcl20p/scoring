<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'device_id',
        'token_id',
        'last_active_at',
        'expires_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_active_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * Get the user that owns the session.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the device associated with this session.
     */
    public function device()
    {
        return $this->belongsTo(UserDevice::class, 'device_id', 'device_id');
    }

    /**
     * Check if the session is expired.
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    /**
     * Update the last active timestamp.
     *
     * @return void
     */
    public function updateActivity()
    {
        $this->update(['last_active_at' => now()]);
    }
}
