<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ressource_id')->index('reservations_ressource_id_foreign');
            $table->unsignedBigInteger('agent_id')->index('reservations_agent_id_foreign');
            $table->unsignedBigInteger('byagent_id')->index('reservations_byagent_id_foreign');
            $table->unsignedBigInteger('lieu_id')->index('reservations_lieu_id_foreign');
            $table->date('date_start');
            $table->integer('time_start');
            $table->date('date_end');
            $table->integer('time_end');
            $table->longText('date_resa');
            $table->text('motif');
            $table->dateTime('dateDebPlusHeure');
            $table->dateTime('dateFinPlusHeure');
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
        Schema::dropIfExists('reservations');
    }
}
