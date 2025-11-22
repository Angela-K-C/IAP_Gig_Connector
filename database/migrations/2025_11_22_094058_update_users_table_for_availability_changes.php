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
        // Remove old fields
        Schema::table('student_profiles', function (Blueprint $table) {

            // Remove old fields
            $table->dropColumn([
                'availability_physical',
                'availability_remote',
                'preferred_hours',
                'experience',
                'skills',
                'interests',
                'profile_completion',
            ]);

            // Add new enum availability
            $table->enum('availability', ['remote', 'on-site', 'hybrid'])
                  ->nullable();

            // Add new fields
            $table->string('phone_number')->nullable();
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Rollback: re-add removed fields
            $table->boolean('availability_physical')->nullable();
            $table->boolean('availability_remote')->nullable();
            $table->string('preferred_hours')->nullable();
            $table->text('experience')->nullable();
            $table->text('skills')->nullable();
            $table->text('interests')->nullable();
            $table->integer('profile_completion')->nullable();

            // Remove new fields
            $table->dropColumn(['availability', 'phone_number', 'location']);
        });
    }
};
