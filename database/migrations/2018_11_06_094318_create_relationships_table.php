<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('tutor')->unsigned();
          $table->integer('tutored')->unsigned();
          $table->string('relationship');
          $table->timestamps();
          $table->foreign('tutor')->references('id')->on('patients');
          $table->foreign('tutored')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
