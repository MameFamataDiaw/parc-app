<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conducteur_id');
            $table->foreign('conducteur_id')->references('id')->on('conducteurs')->onDelete('cascade');
            $table->unsignedBigInteger('voiture_id');
            $table->foreign('voiture_id')->references('id')->on('voitures')->onDelete('cascade');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('dureeContrat')->unsigned();
            $table->decimal('salaire', 10, 2);
            $table->text('conditions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
};
