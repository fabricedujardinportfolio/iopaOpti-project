<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumvertCallinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numvert_callinfo', function (Blueprint $table) {
            $table->integer('id_call', true);
            $table->date('date_resa');
            $table->text('date_resa_default');
            $table->integer('heure_resa');
            $table->string('objet_resa', 250);
            $table->string('nature_resa', 250);
            $table->string('statut_resa', 250);
            $table->string('resultat_resa', 250);
            $table->integer('genre_resa');
            $table->integer('byagentId_resa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numvert_callinfo');
    }
}
