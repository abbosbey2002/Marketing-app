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
            $table->id();
            $table->string('name');
            $table->bigInteger('turnover')->nullable();
            $table->bigInteger('teamSize');
            $table->string('tagline')->nullable();
            $table->date('foundedAt')->nullable();
            $table->date('foundedAt')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->foreignId('language_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key va nullable
            $table->foreignId('service_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key va constrained
            $table->timestamps();
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
