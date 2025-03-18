<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'school_id',
        'class_id',
        'user_id',
        'admission_number',
        'admission_date',
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

    public function user()
    {
        return $this->hasOne(User::class, 'student_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function room()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_enrollments', 'student_id', 'course_id')
            ->withPivot('academic_year', 'semester', 'status', 'enrollment_date', 'completion_date')
            ->withTimestamps();
    }

    /**
     * Get the submissions made by this student.
     */
    public function submissions()
    {
        return $this->hasMany(StudentSubmission::class);
    }

    /**
     * Get the grades received by this student.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}