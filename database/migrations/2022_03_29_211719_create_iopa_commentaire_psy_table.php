<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIopaCommentairePsyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iopa_commentaire_psy', function (Blueprint $table) {
            $table->integer('iopa_commentaire_id', true);
            $table->text('commentaire');
            $table->integer('agent_id')->index('agent_id');
            $table->integer('iopa_individu_id')->index('iopa_individu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iopa_commentaire_psy');
    }
}
