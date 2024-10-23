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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_place'); // Utilisation de snake_case et integer pour les nombres entiers
            $table->string('adresse'); // Utilisation de string avec minuscule pour le type
            $table->integer('bath'); // Utilisation de string avec minuscule pour le type
            $table->integer('num_tel'); // Utilisation de string si le numéro de téléphone n'est pas utilisé pour des calculs
            $table->text('description'); // Utilisation de text pour les descriptions longues
            $table->string('ville'); // Utilisation de text pour les descriptions longues
            $table->decimal('prix', 8, 2); // Utilisation de decimal pour les prix avec précision
            $table->timestamps();
            
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categorys')
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
