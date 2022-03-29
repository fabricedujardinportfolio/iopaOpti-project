<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartienservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartienservices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ressource_id')->index('appartienservices_ressource_id_foreign');
            $table->unsignedBigInteger('poles_service_id')->index('appartienservices_poles_service_id_foreign');
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
        Schema::dropIfExists('appartienservices');
    }
}
