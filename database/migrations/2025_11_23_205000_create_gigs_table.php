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
    Schema::create('gigs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Provider
        
        $table->string('title');
        $table->text('description');
        $table->json('required_skills')->nullable(); // JSON as requested
        
        $table->enum('payment_type', ['fixed', 'hourly']);
        $table->decimal('payment_amount', 10, 2);
        $table->string('duration')->nullable(); // e.g. "2 weeks"
        
        // Location Logic
        $table->string('location')->nullable();
        $table->boolean('is_remote')->default(false);
        
        $table->date('application_deadline');
        $table->enum('status', ['open', 'closed'])->default('open');
        
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('gigs');
}
};
