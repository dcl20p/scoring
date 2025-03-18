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
        Schema::create('assessment_criteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->string('criterion_name', 255);
            $table->text('description')->nullable();
            $table->float('max_points');
            $table->float('multiplier'); // Hệ số nhân
            $table->enum('type', [
                'BINARY', 'NUMERIC', 'TEXT', 'MULTIPLE_CHOICE', 'RUBRIC'
            ])->default('NUMERIC'); // Loại tiêu chí đánh giá
            $table->float('weight')->default(1); // Trọng số của tiêu chí
            $table->timestamps();

            // Indexes
            $table->index('school_id');
            $table->index('assignment_id');
            $table->index('criterion_name');
            $table->index('max_points');
            $table->index('weight');
            $table->index('multiplier');
            
            // Fulltext search
            $table->fullText(['criterion_name', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_criteria');
    }
};
