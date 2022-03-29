<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIopaFicheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iopa_fiche', function (Blueprint $table) {
            $table->integer('iopa_fiche_id', true);
            $table->integer('iopa_individu_id')->index('iopa_individu_id');
            $table->integer('agent_id')->index('agent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iopa_fiche');
    }
}
