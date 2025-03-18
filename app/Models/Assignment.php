<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'course_id',
        'created_by',
        'file_path',
        'title',
        'description',
        'total_points',
        'weight',
        'type',
        'due_date',
        'release_date',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_points' => 'float',
        'weight' => 'float',
        'due_date' => 'datetime',
        'release_date' => 'datetime',
        'is_published' => 'boolean',
    ];

    /**
     * Get the educational institution for this assignment.
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the course for this assignment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user who created this assignment.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the criteria for this assignment.
     */
    public function criteria()
    {
        return $this->hasMany(AssessmentCriteria::class);
    }

    /**
     * Get the submissions for this assignment.
     */
    public function submissions()
    {
        return $this->hasMany(StudentSubmission::class);
    }

    /**
     * Get the grades for this assignment.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
