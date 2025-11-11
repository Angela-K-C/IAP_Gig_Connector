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
           $table->id(); // Primary Key: id
            
            // FK to providers (which uses user_id as its primary key)
            $table->foreignId('provider_id')->constrained('providers', 'user_id'); 
            
            $table->string('title', 100);
            $table->text('description');
            $table->text('required_skills')->nullable();
            $table->enum('payment_type', ['fixed', 'hourly']);
            $table->decimal('payment_amount', 10, 2);
            $table->string('duration', 50);
            $table->date('application_deadline');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
            $table->softDeletes(); // Recommended: Soft Deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};
