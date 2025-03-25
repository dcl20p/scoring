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

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'level',
        'url',
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

    /**
     * The "booted" method of the model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Log>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Apply filters to the query.
     * @param mixed $query
     * @param mixed $filters
     * @return void
     */ 
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['level'] ?? null, fn($q, $level) => $q->where('level', $level))
              ->when($filters['user_type'] ?? null, fn($q, $userType) => $q->where('user_type', $userType))
              ->when($filters['search'] ?? null, fn($q, $search) => $q->where('message', 'like', "%{$search}%"))
              ->when($filters['from_date'] ?? null, fn($q, $fromDate) => $q->whereDate('created_at', '>=', $fromDate))
              ->when($filters['to_date'] ?? null, fn($q, $toDate) => $q->whereDate('created_at', '<=', $toDate));
    }
}
