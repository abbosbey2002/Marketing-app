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
        Schema::create('provider_service_skill', function (Blueprint $table) {
            $table->id();
            
            // 'providers' jadvalidan foreign key
            $table->foreignId('provider_id')->constrained()->onDelete('cascade');
            
            // 'services' jadvalidan foreign key
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            
            // 'skills' jadvalidan foreign key
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_service_skill');
    }
};
