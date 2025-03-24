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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('level');
            $table->string('url');
            $table->text('message');
            $table->json('context')->nullable();
            $table->json('extra')->nullable();
            $table->enum('user_type', [
                'SUPER_ADMIN', 
                'ADMIN', 
                'TEACHER', 
                'STUDENT', 
                'GUEST']
            )->default('GUEST');
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('level');
            $table->index('user_id');
            $table->index('user_type');
            $table->index('ip_address');

            $table->fullText('message');
            $table->fullText('context');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
