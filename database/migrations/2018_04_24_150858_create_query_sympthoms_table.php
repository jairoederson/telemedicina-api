<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuerySympthomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('query_sympthoms', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('query_id')->unsigned();
          $table->integer('sympthom_id')->unsigned();

          $table->foreign('query_id')->references('id')->on('queries');
          $table->foreign('sympthom_id')->references('id')->on('symptom');
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
        Schema::dropIfExists('query_sympthoms');
    }
}
