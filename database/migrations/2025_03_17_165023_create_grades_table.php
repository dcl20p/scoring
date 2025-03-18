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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('submission_id')->constrained('student_submissions')->onDelete('cascade');
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('graded_by')->constrained('users')->onDelete('cascade');
            $table->float('score');
            $table->text('feedback')->nullable();
            $table->json('criteria_scores')->nullable(); // Scores for individual criteria as JSON
            $table->timestamp('graded_at');
            $table->timestamps();

            // Indexes
            $table->index('school_id');
            $table->index('submission_id');
            $table->index('assignment_id');
            $table->index('student_id');
            $table->index('graded_by');
            $table->index('graded_at');
            $table->index('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
