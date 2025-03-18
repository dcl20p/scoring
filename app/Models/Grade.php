<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'submission_id',
        'assignment_id',
        'student_id',
        'graded_by',
        'score',
        'feedback',
        'criteria_scores',
        'graded_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'score' => 'float',
        'criteria_scores' => 'array',
        'graded_at' => 'datetime',
    ];

    /**
     * Get the educational school for this grade.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the submission this grade is for.
     */
    public function submission()
    {
        return $this->belongsTo(StudentSubmission::class, 'submission_id');
    }

    /**
     * Get the assignment this grade is for.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the student this grade is for.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the user who graded this submission.
     */
    public function gradedBy()
    {
        return $this->belongsTo(User::class, 'graded_by');
    }
}
