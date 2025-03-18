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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->string('name', 100);
            $table->string('code', 30)->nullable();
            $table->text('description')->nullable();
            $table->integer('credits')->nullable(); // Số tín chỉ của khóa học
            $table->string('level', 50)->nullable(); // C độ đào tạo (e.g., undergraduate, graduate, PhD, ...)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Make code unique within an school
            $table->unique(['school_id', 'code']);

            // Indexes
            $table->index('school_id');
            $table->index('department_id');
            $table->index('credits');
            $table->index('is_active');
            
            // Fulltext search
            $table->fullText(['name', 'code', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
