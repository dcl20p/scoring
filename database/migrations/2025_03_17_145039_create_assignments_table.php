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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('title', 150);
            $table->string('file_path')->nullable(); // Dường dân tới file bài tập
            $table->text('description')->nullable();
            $table->float('total_points')->default(10); // Tổng điểm tối đa của bài tập
            $table->float('weight')->default(1); // Trọng số của bài tập
            $table->enum('type', ['HOMEWORK', 'QUIZ', 'EXAM', 'PROJECT', 'OTHER'])->default('EXAM');
            $table->timestamp('due_date')->nullable(); // Hạn nộp bài    
            $table->timestamp('release_date')->nullable(); // Ngày phát hành bài tập
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            // Indexes
            $table->index('school_id');
            $table->index('course_id');
            $table->index('created_by');
            $table->index('type');
            $table->index('due_date');
            $table->index('release_date');
            $table->index('is_published');
            
            // Fulltext search
            $table->fullText(['title', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
