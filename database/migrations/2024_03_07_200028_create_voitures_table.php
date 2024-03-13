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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('modele');
            $table->string('marque');
            $table->date('dateAchat');
            $table->string('numPlaque');
            $table->string('matricule');
            $table->double('kilometrage');
            $table->decimal('prix', 8, 2);
            $table->enum('statut', ['en panne', 'en marche', 'active', 'inactive'])->default('active');
            $table->unsignedBigInteger('conducteur_id')->nullable();
            $table->foreign('conducteur_id')->references('id')->on('conducteurs')->onDelete('set null');
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
        Schema::dropIfExists('voitures');
    }
};
