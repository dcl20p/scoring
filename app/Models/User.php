<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use \Illuminate\Auth\MustVerifyEmail;
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasApiTokens, Notifiable;

    const ROLE_SUPER_ADMIN = 'SUPER_ADMIN';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_TEACHER = 'TEACHER';
    const ROLE_STUDENT = 'STUDENT';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'role',
        'school_id',
        'employee_id',
        'student_id',
        'bio',
        'avatar',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    const ROLES = [
        'SUPER_ADMIN' => 'SUPER_ADMIN',
        'ADMIN' => 'ADMIN',
        'TEACHER' => 'TEACHER',
        'STUDENT' => 'STUDENT',
    ];

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if the user is a super admin.
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->role === self::ROLES['SUPER_ADMIN'];
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === self::ROLES['ADMIN'];
    }

    /**
     * Check if the user is a teacher.
     *
     * @return bool
     */
    public function isTeacher()
    {
        return $this->role === self::ROLES['TEACHER'];
    }

    /**
     * Check if the user is a student.
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->role === self::ROLES['STUDENT'];
    }

    /**
     * Get the educational institution that the user belongs to.
     */
    public function schools()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the employee that the user represents.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Get the courses taught by this teacher.
     */
    public function coursesTaught()
    {
        return $this->hasMany(CourseEnrollment::class, 'teacher_id');
    }

    /**
     * Get the assignments created by this user.
     */
    public function assignmentsCreated()
    {
        return $this->hasMany(Assignment::class, 'created_by');
    }

    /**
     * Get the grades given by this user.
     */
    public function gradesGiven()
    {
        return $this->hasMany(Grade::class, 'graded_by');
    }

     /**
     * Get the courses taught by this teacher.
     */
    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id');
    }

    /**
     * Get the devices associated with this user.
     */
    public function devices()
    {
        return $this->hasMany(UserDevice::class);
    }

    /**
     * Get the sessions associated with this user.
     */
    public function sessions()
    {
        return $this->hasMany(UserSession::class);
    }

    /**
     * Get the failed login attempts associated with this user.
     */
    public function failedLogins()
    {
        return $this->hasMany(FailedLogin::class);
    }

    /**
     * Check if the user has reached the maximum number of failed login attempts.
     *
     * @param int $maxAttempts
     * @param int $lockoutTime
     * @return bool
     */
    public function hasReachedMaxLoginAttempts($maxAttempts = 5, $lockoutTime = 5)
    {
        return FailedLogin::getRecentAttempts($this->id, $lockoutTime) >= $maxAttempts;
    }
}
