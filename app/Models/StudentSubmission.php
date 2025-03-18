<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'assignment_id',
        'student_id',
        'submission_content',
        'file_paths',
        'submitted_at',
        'is_late',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'file_paths' => 'array',
        'submitted_at' => 'datetime',
        'is_late' => 'boolean',
    ];

    /**
     * Get the educational school for this submission.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the assignment for this submission.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the student who made this submission.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the grade for this submission.
     */
    public function grade()
    {
        return $this->hasOne(Grade::class, 'submission_id');
    }
}
