<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affiliate_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('isResponsible')->unsigned();
            $table->timestamps();
            $table->foreign('affiliate_id')->references('id')->on('patients');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliate_patients');
    }
}
