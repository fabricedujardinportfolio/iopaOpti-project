<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntraMessageinstanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intra_messageinstante', function (Blueprint $table) {
            $table->integer('intra_messageInstante_id', true);
            $table->string('first_name', 80);
            $table->string('comment', 250);
            $table->string('dateNow', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intra_messageinstante');
    }
}
