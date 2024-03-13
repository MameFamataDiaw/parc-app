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
        Schema::create('attributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conducteur_id');
            $table->unsignedBigInteger('voiture_id');
            $table->string('lieu_depart');
            $table->string('lieu_arrivee');
            $table->dateTime('heure_depart');
            $table->dateTime('heure_arrivee');
            $table->foreign('conducteur_id')->references('id')->on('conducteurs')->onDelete('cascade');
            $table->foreign('voiture_id')->references('id')->on('voitures')->onDelete('cascade');
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
        Schema::dropIfExists('attributions');
    }
};
