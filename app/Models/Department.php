<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'school_id',
        'code',
        'name',
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
     * Get the educational institution that this department belongs to.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<School, Department>
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the classrooms that belong to this department.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<ClassRoom, Department>
     */
    public function rooms()
    {
        return $this->hasMany(ClassRoom::class, 'department_id');
    }

    /**
     * Get all the students in this department.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Student, Department>
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'department_id');
    }

    /**
     * Get all the courses offered by this department.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Course, Department>
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id');
    }
}
