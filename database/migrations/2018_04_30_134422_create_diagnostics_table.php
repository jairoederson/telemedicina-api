<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('type_diagnostics', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('description')->nullable();
          $table->enum('state', array('1', '0'))->nullable();
          $table->timestamps();
      });


      Schema::create('diagnostics', function (Blueprint $table) {
          $table->increments('id');
          $table->string('code')->nullable();
          $table->string('description')->nullable();
          $table->integer('type_diagnostic_id')->unsigned();
          $table->integer('query_offline_id')->nullable()->unsigned();
          $table->integer('query_id')->nullable()->unsigned();

          $table->foreign('type_diagnostic_id')->references('id')->on('type_diagnostics');
          $table->foreign('query_offline_id')->references('id')->on('query_offlines');
          $table->foreign('query_id')->references('id')->on('queries');

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
        Schema::dropIfExists('diagnostics');
    }
}
