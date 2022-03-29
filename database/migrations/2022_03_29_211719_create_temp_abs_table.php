<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempAbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_abs', function (Blueprint $table) {
            $table->integer('id');
            $table->text('name')->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('pole')->nullable();
            $table->dateTime('date_deb')->nullable();
            $table->boolean('crenaux_deb')->nullable();
            $table->dateTime('date_fin')->nullable();
            $table->boolean('crenaux_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_abs');
    }
}
