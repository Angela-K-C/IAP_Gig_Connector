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
    Schema::create('provider_profiles', function (Blueprint $table) {
        $table->foreignId('user_id')->primary()->constrained()->onDelete('cascade');
        
        $table->string('organization_name');
        $table->string('contact_number')->nullable();
        $table->text('about_provider')->nullable();
        $table->string('logo_path')->nullable();
        $table->boolean('is_verified')->default(false);
        
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('provider_profiles');
}
};
