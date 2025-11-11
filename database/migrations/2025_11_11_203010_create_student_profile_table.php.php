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
        Schema::create('student_profiles', function(Blueprint $table) {
         $table->foreignId('user_id')->constrained('users')->primary();

            $table->string('university', 100);
            $table->string('year_of_study', 20);
            $table->string('field_of_study', 100);
            $table->text('skills')->nullable();
            $table->text('interests')->nullable();
            $table->text('experience')->nullable();
            $table->boolean('availability_remote')->default(false);
            $table->boolean('availability_physical')->default(false);
            $table->enum('preferred_hours', ['weekdays', 'weekends', 'evenings']);
            $table->string('bio', 300)->nullable();
            $table->string('cv_path', 255)->nullable();
            $table->tinyInteger('profile_completion')->default(0);
            $table->timestamps();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
