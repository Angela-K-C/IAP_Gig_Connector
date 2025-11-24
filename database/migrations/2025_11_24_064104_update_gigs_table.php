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
        Schema::table('gigs', function (Blueprint $table) {
            // Add new columns
            $table->string('location')->nullable();
            $table->boolean('is_open')->default(true);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');

            // Remove column
            $table->dropColumn('required_skills');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gigs', function (Blueprint $table) {
            $table->string('required_skills')->nullable();
            $table->dropColumn(['location', 'is_open', 'category_id']);
        });
    }
};
