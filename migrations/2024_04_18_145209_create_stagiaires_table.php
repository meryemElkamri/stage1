<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('cin')->unique();
            $table->string('email')->unique();
            $table->string('telephone');

            
            // Foreign keys
            $table->unsignedBigInteger('id_etablissement')->nullable();
            $table->unsignedBigInteger('id_division')->nullable();
            $table->unsignedBigInteger('id_diplome')->nullable();
            $table->unsignedBigInteger('id_specialite')->nullable();
            $table->unsignedBigInteger('id_projet')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();

            // Constraints for foreign keys
            $table->foreign('id_etablissement')->references('id')->on('etablissements')->onDelete('set null');
            $table->foreign('id_division')->references('id')->on('divisions')->onDelete('set null');
            $table->foreign('id_diplome')->references('id')->on('diplomes')->onDelete('set null');
            $table->foreign('id_specialite')->references('id')->on('specialites')->onDelete('set null');
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('set null');
            $table->foreign('id_user')->references('id')->on('users');

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
        Schema::dropIfExists('stagiaires');
    }
};
