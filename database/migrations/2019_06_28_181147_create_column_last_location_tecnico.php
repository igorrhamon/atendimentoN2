<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnLastLocationTecnico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tecnicos', function (Blueprint $table) {
            $table->unsignedInteger('lastLocation_id')->nullable();
            $table->foreign('lastLocation_id')->references('id')->on('locations')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('column_last_location_tecnico');
    }
}
