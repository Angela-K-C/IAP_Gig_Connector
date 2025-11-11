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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Primary Key: id
            
            // FK to users table
            $table->foreignId('user_id')->constrained('users');
            
            $table->string('title', 100);
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamp('created_at')->useCurrent();
            // Note: Updated_at is generally not needed for notifications
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};