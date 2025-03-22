<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class School extends Model
{
    use HasFactory;

    const TYPE_UNIVERSITY = 'UNIVERSITY';
    const TYPE_SCHOOL = 'SCHOOL';
    const TYPE_COLLEGE = 'COLLEGE';
    const TYPE_VOCATIONAL = 'VOCATIONAL';
    const TYPE_OTHER = 'OTHER';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'type',
        'address',
        'province',
        'district',
        'phone',
        'email',
        'website',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the unique identifier for this school.
     *
     * @return string
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($school) {
            $school->code = Str::substr(
                str_replace('-', '', Str::uuid()), 0, 16
            );
        });
    }

    /**
     * Get the users that belong to the school.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'school_id');
    }

    /**
     * Get the registration codes that belong to the school.
     */
    public function registrationCodes()
    {
        return $this->hasMany(RegistrationCode::class, 'school_id');
    }

    /**
     * Get the departments that belong to the school.
     */
    public function departments()
    {
        return $this->hasMany(Department::class, 'school_id');
    }

    /**
     * Get the courses that belong to the school.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'school_id');
    }

    /**
     * Get the students that belong to the school.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'school_id');
    }
}
