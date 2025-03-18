<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('academic_year', 9); // Năm học mà sinh viên đăng ký khóa học. (VD: 2024/2025)
            $table->string('semester', 20)->nullable(); // Học kỳ (e.g., 1, 2, 3, 4)
            $table->enum('status', ['ENROLLED', 'COMPLETED', 'WITHDRAWN'])->default('ENROLLED'); // Trạng thái đăng ký khóa học của sinh viên
            $table->timestamp('enrollment_date');
            $table->timestamp('completion_date')->nullable();
            $table->timestamps();
            
            // Each student can only be enrolled in a course once per semester/academic year
            $table->unique(['course_id', 'student_id', 'academic_year', 'semester'], 'unique_enrollment');

            // Indexes
            $table->index('school_id');
            $table->index('course_id');
            $table->index('student_id');
            $table->index('teacher_id');
            $table->index('status');
            $table->index('enrollment_date');
            $table->index('completion_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollments');
    }
};
