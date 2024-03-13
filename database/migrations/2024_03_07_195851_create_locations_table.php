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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('lieuDeDepart');
            $table->string('lieuDarrivee');
            $table->time('heureDeDepart');
            $table->time('heureDarrivee');
            $table->date('dateLocation');
            $table->unsignedBigInteger('conducteur_id');
            $table->foreign('conducteur_id')->references('id')->on('conducteurs')->onDelete('cascade');
            $table->unsignedBigInteger('voiture_id');
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
        Schema::dropIfExists('locations');
    }
};
