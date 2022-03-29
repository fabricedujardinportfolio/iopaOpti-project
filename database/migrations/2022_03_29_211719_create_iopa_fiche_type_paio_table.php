<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIopaFicheTypePaioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iopa_fiche_type_paio', function (Blueprint $table) {
            $table->integer('iopa_fiche_type_paio_id', true);
            $table->text('iopa_fiche_type_paio_title');
            $table->integer('iopa_fiche_id')->index('iopa_fiche_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iopa_fiche_type_paio');
    }
}
