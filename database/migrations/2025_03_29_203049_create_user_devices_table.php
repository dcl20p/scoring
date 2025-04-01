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
        Schema::create('user_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('device_id');
            $table->string('device_name');
            $table->string('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('is_trusted')->default(false);
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
            
            // Indexes 
            $table->index('is_trusted');
            $table->unique(['user_id', 'device_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_devices');
    }
};
