<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique(); // Misol uchun, 'en' - Ingliz tili
            $table->timestamps();
        });

        // Ma'lumotlarni to'ldirish uchun
        DB::table('languages')->insert([
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'Russian', 'code' => 'ru'],
            ['name' => 'Uzbek', 'code' => 'uz'],
            // Yana kerakli tillarni qo'shing
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
}
