<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedLogin extends Model
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
        'device_name',
        'user_agent',
        'ip_address',
        'last_used_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_used_at' => 'datetime',
    ];

    /**
     * Get the user that owns the failed login.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get recent failed login attempts for a specific user.
     *
     * @param int $userId
     * @param int $minutes
     * @return int
     */
    public static function getRecentAttempts($userId, $minutes = 5)
    {
        return self::where('user_id', $userId)
            ->where('created_at', '>=', now()->subMinutes($minutes))
            ->count();
    }
}
