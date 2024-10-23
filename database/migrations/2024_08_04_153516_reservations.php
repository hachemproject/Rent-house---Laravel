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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date_deb'); 
            $table->date('date_fin'); 
            $table->timestamps();

            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')
                  ->references('id')
                  ->on('homes')
                  ->onDelete('cascade');

                  $table->unsignedBigInteger('user_id');
                  $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project-rent');
    }
};
