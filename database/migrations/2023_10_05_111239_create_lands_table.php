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
        Schema::create('lands', function (Blueprint $table)
        {
            $table->id();
            // $table->string('land_photo');
            $table->string('land_num');
            $table->integer('meter_price');
            $table->integer('land_area');
            $table->string('land_address');
            $table->string('land_city');
            $table->text('land_description');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
