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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->string('name', 100);
            $table->string('code', 20)->nullable();
            $table->string('academic_year', 9)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Make class code unique within an institution
            $table->unique(['school_id', 'code']);
            
            // Indexes
            $table->index('school_id');
            $table->index('department_id');
            $table->index('name');
            $table->index('code');
            $table->index('academic_year');
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
        Schema::dropIfExists('classes');
    }
};
