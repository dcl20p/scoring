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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->foreignId('class_id')->nullable()->constrained('classes')->nullOnDelete();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('qr_code', 30)->unique();
            $table->string('student_id')->nullable(); // Mã sinh viên trong nội bộ trường
            $table->string('email', 100)->nullable()->unique(); 
            $table->string('phone', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 15)->nullable();
            $table->string('enrollment_year', 4)->nullable(); // Năm nhập học của sinh viên
            $table->string('current_year', 4)->nullable(); // Năm học hiện tại của sinh viên
            $table->enum('status', ['ACTIVE', 'GRADUATED', 'WITHDRAWN', 'OTHER'])->default('ACTIVE');
            $table->timestamps();
            
            // Make student_id unique within an institution
            $table->unique(['school_id', 'student_id']);

            // Indexes
            $table->index('school_id');
            $table->index('department_id');
            $table->index('class_id');
            $table->index('email');
            $table->index('status');
            $table->index('enrollment_year');
            $table->index('current_year');
            $table->index('gender');
            $table->index('qr_code');

            // Fulltext search
            $table->fullText(['first_name', 'last_name', 'email', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
