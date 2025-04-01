<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
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
        'is_trusted',
        'last_used_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_trusted' => 'boolean',
        'last_used_at' => 'datetime',
    ];

    /**
     * Get the user that owns the device.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the sessions for this device.
     */
    public function sessions()
    {
        return $this->hasMany(UserSession::class, 'device_id', 'device_id');
    }

    /**
     * Generate a unique device identifier.
     *
     * @param string $userAgent
     * @param string $ipAddress
     * @param int $userId
     * @return string
     */
    public static function generateDeviceId($userAgent, $ipAddress, $userId)
    {
        return hash('sha256', $userAgent . $ipAddress . $userId);
    }
}
