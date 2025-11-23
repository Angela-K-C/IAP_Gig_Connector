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
    Schema::create('student_profiles', function (Blueprint $table) {
        // Primary key is also the Foreign Key linking to Users
        $table->foreignId('user_id')->primary()->constrained()->onDelete('cascade');
        
        $table->string('university')->nullable();
        $table->string('year_of_study')->nullable();
        $table->string('field_of_study')->nullable();
        $table->json('skills')->nullable(); // Storing as JSON array
        $table->text('interests')->nullable();
        $table->text('experience')->nullable();
        $table->text('bio')->nullable();
        $table->string('cv_path')->nullable();
        
        // Availability & Preferences
        $table->boolean('availability_remote')->default(false);
        $table->boolean('availability_physical')->default(false);
        $table->enum('preferred_hours', ['weekdays', 'weekends', 'evenings'])->nullable();
        
        $table->tinyInteger('profile_completion')->default(0);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('student_profiles');
}
};
