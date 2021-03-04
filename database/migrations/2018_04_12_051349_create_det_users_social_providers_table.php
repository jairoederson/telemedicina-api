<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetUsersSocialProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_users_social_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_provider');
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('social_provider_id')->unsigned();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('social_provider_id')->references('id')->on('social_providers');
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
        Schema::dropIfExists('det_users_social_providers');
    }
}
