<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaymentCompanyPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->string('stripe_token');
            $table->decimal('amount', 5, 2);
            $table->date('payment_date');
            $table->string('payment_description');

            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('payment_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('stripe_token');
            //$table->string('amount');
            $table->decimal('amount', 5, 2);
            $table->date('payment_date');
            $table->string('payment_description');
            $table->string('month');
            $table->string('year');
            $table->integer('estado')->unsigned();
            $table->string('voucher')->nullable();

            //$table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('payment_doctors', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('doctor_id')->unsigned();
            $table->string('stripe_token');
            //$table->string('amount');
            $table->decimal('amount', 5, 2);
            $table->date('payment_date');
            $table->string('payment_description');
            $table->string('month',2);
            $table->string('year',4);
            $table->integer('estado')->unsigned();


            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::drop('payment');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
