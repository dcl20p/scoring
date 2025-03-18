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
        Schema::create('student_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->text('submission_content')->nullable();
            $table->json('file_paths')->nullable(); // Store multiple file paths as JSON
            $table->timestamp('submitted_at');
            $table->boolean('is_late')->default(false);
            $table->string('status')->default('submitted'); // submitted, graded, returned
            $table->timestamps();
            
            // Mỗi sinh viên chỉ nộp 1 bài trên mỗi assignment
            $table->unique(['assignment_id', 'student_id']);

            // Indexes
            $table->index('assignment_id');
            $table->index('student_id');
            $table->index('status');
            $table->index('submitted_at');

            // Fulltext search for the submission content
            $table->fullText(['submission_content']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_submissions');
    }
};
