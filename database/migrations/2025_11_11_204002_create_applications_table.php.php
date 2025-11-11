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
        Schema::create('applications', function (Blueprint $table) {
            $table->id(); // Primary Key: id
            
            // FK to gigs table
            $table->foreignId('job_id')->constrained('gigs');
            
            // FK to student_profiles table (which uses user_id as its primary key)
            $table->foreignId('student_id')->constrained('student_profiles', 'user_id');

            $table->enum('status', ['applied', 'shortlisted', 'selected', 'not_selected'])->default('applied');
            $table->timestamp('applied_at')->useCurrent();
            $table->text('notes')->nullable();
            
            // Unique Composite Key: Prevents a student from applying to the same job twice
            $table->unique(['job_id', 'student_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};