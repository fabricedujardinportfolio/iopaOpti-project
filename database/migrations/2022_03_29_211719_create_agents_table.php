<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('name')->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('function', 80)->nullable();
            $table->string('passwords', 45)->nullable();
            $table->tinyInteger('active');
            $table->string('email', 70)->nullable();
            $table->unsignedBigInteger('poles_services_id')->index('fk_agents_poles_services1');
            $table->tinyInteger('role_ressource')->default(0);
            $table->tinyInteger('role_absence')->default(0);
            $table->tinyInteger('role_bddagents')->default(0);
            $table->tinyInteger('role_numVert')->default(0);
            $table->tinyInteger('role_allMdpChange')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
