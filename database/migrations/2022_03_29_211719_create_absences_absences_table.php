<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences_absences', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->unsignedBigInteger('motif_start_id')->index('fk_absences_absences_absences_motif_start1');
            $table->unsignedBigInteger('motif_end_id')->index('absences_motif_end');
            $table->unsignedBigInteger('agents_id');
            $table->unsignedBigInteger('agents_poles_services_id');

            $table->index(['agents_id', 'agents_poles_services_id'], 'fk_absences_absences_agents1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences_absences');
    }
}
