<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIopaFicheTypePaioFichierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iopa_fiche_type_paio_fichier', function (Blueprint $table) {
            $table->integer('iopa_fiche_type_paio_fichier_id', true);
            $table->text('iopa_fiche_type_paio_fichier');
            $table->integer('iopa_fiche_type_paio_id')->index('iopa_fiche_type_paio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iopa_fiche_type_paio_fichier');
    }
}
