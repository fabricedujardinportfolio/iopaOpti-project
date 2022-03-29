<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsHasApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents_has_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('agents_id')->index('fk_agents_has_applications_agents1');
            $table->unsignedBigInteger('applications_id')->index('fk_agents_has_applications_applications1');
            $table->string('droit', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents_has_applications');
    }
}
