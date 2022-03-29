<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIopaFicheTypePaioFichesuiviCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iopa_fiche_type_paio_fichesuivi_commentaire', function (Blueprint $table) {
            $table->integer('iopa_fiche_type_paio_fichesuivi_commentaire_id', true);
            $table->integer('iopa_fiche_type_paio_fichesuivi_id');
            $table->text('iopa_fiche_type_paio_fichesuivi_commentaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iopa_fiche_type_paio_fichesuivi_commentaire');
    }
}
