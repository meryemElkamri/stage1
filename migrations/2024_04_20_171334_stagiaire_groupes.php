<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StagiaireGroupes extends Migration
{
    public function up()
    {
        Schema::create('stagiaire_groupes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->unsignedBigInteger('id_stagiaire');
            $table->unsignedBigInteger('id_groupe');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('projet_complet')->default('non complet');
            $table->enum('travail_satisfaisant', ['faible', 'moyen', 'bien', 'tres bien'])->default('moyen');
            $table->double('note');
            $table->json('piece')->nullable();
            $table->timestamps();

            $table->foreign('id_stagiaire')->references('id')->on('stagiaires');
            $table->foreign('id_groupe')->references('id')->on('groupes');
            $table->primary(['id_stagiaire', 'id_groupe']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stagiaire_groupes');
    }
}
