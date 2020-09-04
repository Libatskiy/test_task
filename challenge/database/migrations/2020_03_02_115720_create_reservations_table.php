<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('number_people');
            $table->unsignedInteger('hookah_id');
            $table->dateTime('time_from');
            $table->dateTime('time_to');
            $table->enum('status',['1','2','3'])->default('1');
            $table->foreign('hookah_id')->references('id')->on('hookahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
