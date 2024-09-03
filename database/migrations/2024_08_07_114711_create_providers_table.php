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
            $table->bigInteger('teamSize')->nullable();
            $table->string('tagline')->nullable();
            $table->date('foundedAt')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->bigInteger('language_id')->unsigned()->nullable();
            $table->bigInteger('service_id')->unsigned()->nullable();
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
