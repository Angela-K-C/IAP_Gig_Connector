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
        Schema::create('providers', function (Blueprint $table) {
           $table->foreignId('user_id')->constrained('users')->primary();

            $table->string('organization_name', 100);
            $table->string('contact_number', 20)->nullable();
            $table->text('about_provider')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Recommended: Soft Deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
