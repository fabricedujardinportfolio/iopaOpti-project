<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csv', function (Blueprint $table) {
            $table->text('nom');
            $table->string('matricule', 256);
            $table->string('bs', 256);
            $table->string('qr', 256);
            $table->string('date_entree', 256);
            $table->string('date_sortie', 256);
            $table->dateTime('date_debut');
            $table->string('temoin_midi_debut', 1);
            $table->dateTime('date_fin');
            $table->string('temoin_midi_fin', 1);
            $table->string('temoin_prolongation', 256);
            $table->string('temoin_gestion', 256);
            $table->string('code_motif', 256);
            $table->string('motif', 256);
            $table->string('raison_absence', 256);
            $table->string('temoin_prime_annuelle', 256);
            $table->string('lieu_absence', 256);
            $table->string('duree_1', 8);
            $table->string('duree_2', 8);
            $table->string('commentaires', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csv');
    }
}
