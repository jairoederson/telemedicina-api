<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('estado')->unsigned();
            $table->string('telephone',50);
            $table->string('telephone_aux',50);
            $table->string('address',500);
            $table->string('name',50);
            $table->string('address_extra_info')->nullable();            
            $table->integer('ubigeo_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');           
            $table->string('url_image', 100)->nullable();;
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
        Schema::dropIfExists('laboratories');
    }
}
