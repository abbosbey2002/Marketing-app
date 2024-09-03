<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersManagerTable extends Migration
{
    public function up()
    {
        Schema::create('providers_manager', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained('providers')->onDelete('cascade');
            $table->string('manager_name');
            $table->string('manager_email')->unique();
            $table->string('manager_password');
            $table->string('role')->default('admin');  // `role` ustuni qo'shildi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('providers_manager');
    }
}
