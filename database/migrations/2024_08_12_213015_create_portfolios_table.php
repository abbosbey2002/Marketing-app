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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->foreignId('provider_id')->constrained('providers')->cascadeOnDelete();
            $table->string('name');
            $table->string('image');
            $table->text('skills');
            $table->bigInteger('budget');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('introduction');
            $table->text('challenges');
            $table->text('solution');
            $table->text('impact');
            $table->text('link');
            $table->string('company_name');
            $table->string('company_location');
            $table->text('sector');
            $table->text('audience');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
