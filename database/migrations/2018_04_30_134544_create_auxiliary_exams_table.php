<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuxiliaryExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxiliary_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('laboratory')->nullable();
            $table->string('imaging')->nullable();
            $table->integer('query_id')->unsigned();

            $table->foreign('query_id')->references('id')->on('query_offlines');

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
        Schema::dropIfExists('auxiliary_exams');
    }
}
