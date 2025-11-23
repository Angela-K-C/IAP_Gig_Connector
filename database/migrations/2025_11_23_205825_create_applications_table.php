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
        $table->id();
        $table->foreignId('gig_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Student
        
        $table->enum('status', ['applied', 'shortlisted', 'selected', 'not_selected'])->default('applied');
        $table->text('notes')->nullable(); // Feedback from provider
        
        $table->timestamps(); // Covers 'applied_at' and updates

        // Prevent student from applying to the same gig twice
        $table->unique(['gig_id', 'user_id']);
    });
}

public function down(): void
{
    Schema::dropIfExists('applications');
}
};
