<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHookahRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hookah_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hookah_id');
            $table->unsignedInteger('hookah_bar_id');
            $table->foreign('hookah_bar_id')->references('id')->on('hookah_bars')->onDelete('cascade');
            $table->foreign('hookah_id')->references('id')->on('hookahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hookah_relations');
    }
}
