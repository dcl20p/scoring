<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "classes";

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'school_id',
        'name',
        'code',
        'academic_year',
        'department_id',
        'description',
        'is_active',
    ];

    /**
     * Get the educational institution that this class belongs to.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<School, ClassRoom>
     */
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Get the department that this class belongs to.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Department, ClassRoom>
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get all the students in this class.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Student, ClassRoom>
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
