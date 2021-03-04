<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('validity')->nullable();
            $table->string('date')->nullable();
            $table->string('general_recomendation')->nullable();
            $table->string('state_notification')->nullable();
            $table->integer('query_id')->unsigned()->nullable();
            $table->integer('query_offline_id')->unsigned()->nullable();

            $table->foreign('query_id')->references('id')->on('queries');
            $table->foreign('query_offline_id')->references('id')->on('query_offlines');

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
        Schema::dropIfExists('treatments');
    }
}
