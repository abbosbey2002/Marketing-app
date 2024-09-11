<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rating');
            $table->text('description_summary')->nullable();
            $table->text('origin')->nullable();
            $table->text('user_full_name')->nullable();
            $table->text('email')->nullable();
            $table->text('user_job_title')->nullable();
            $table->text('user_company_name')->nullable();
            $table->text('company_industry')->nullable();
            $table->bigInteger('company_size')->nullable();
            $table->text('providing_service')->nullable();
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('provider_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
