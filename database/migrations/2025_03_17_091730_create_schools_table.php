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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 30)->unique();
            $table->enum('type', ['SCHOOL', 'UNIVERSITY', 'COLLEGE', 'VOCATIONAL', 'OTHER'])->default('UNIVERSITY');
            $table->string('address', 200)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('email', 100)->unique();
            $table->string('phone')->nullable();
            $table->string('website', 150)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Indexes
            $table->index('type');
            $table->index('province');
            $table->index('district');
            $table->index('is_active');
            
            // Fulltext search
            $table->fullText(['name', 'address', 'district', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
