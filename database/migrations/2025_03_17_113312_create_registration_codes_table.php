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
        Schema::create('registration_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->string('code', 30)->unique();
            $table->enum('role', ['ADMIN', 'TEACHER', 'STUDENT'])->default('TEACHER'); // Quyền sử dụng cấp khi đăng ký (VD: student, teacher)
            $table->integer('max_uses')->nullable(); // Số lần tối đa có thể được sử dụng
            $table->integer('usage_count')->default(0); // Số lần mã đã được sử dụng
            $table->boolean('is_active')->default(true);
            $table->timestamp('expires_at')->nullable(); // Thời gian hết hạn của mã
            $table->timestamps();

            // Indexes
            $table->index('school_id');
            $table->index('role');
            $table->index('is_active');
            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_codes');
    }
};
