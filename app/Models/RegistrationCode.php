<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationCode extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'code',
        'role',
        'is_active',
        'max_uses',
        'usage_count',
        'expires_at',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    /**
     * Get the educational institution that the registration code belongs to.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Check if the registration code is valid.
     * 
     * @return bool
     */
    public function isValid()
    {
        // Check if the code is active
        if (!$this->is_active) {
            return false;
        }

        // Check if the code has expired
        if ($this->expires_at !== null && $this->expires_at->isPast()) {
            return false;
        }

        // Check if the code has reached its maximum uses
        if ($this->max_uses !== null && $this->usage_count >= $this->max_uses) {
            return false;
        }

        return true;
    }

    /**
     * Increment the usage count of the code.
     */
    public function incrementUsage()
    {
        $this->increment('usage_count');
        
        // If the code has reached its maximum uses, deactivate it
        if ($this->max_uses !== null && $this->usage_count >= $this->max_uses) {
            $this->is_active = false;
            $this->save();
        }
    }

    /**
     * Generate a unique registration code.
     * 
     * @return string
     */
    public static function generateUniqueCode()
    {
        do {
            $code = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));
        } while (self::where('code', $code)->exists());

        return $code;
    }
}
