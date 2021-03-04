<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('specialty')->nullable();
            $table->string('id_cmp')->nullable();
            $table->decimal('qualification',4,2)->default(0.00);
            $table->string('linkedIn')->nullable();
            $table->text('about_me')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('specialty_id')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->integer('status_sinch')->unsigned()->nullable();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('specialty_id')->references('id')->on('specialties');
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
        Schema::dropIfExists('doctors');
    }
}
