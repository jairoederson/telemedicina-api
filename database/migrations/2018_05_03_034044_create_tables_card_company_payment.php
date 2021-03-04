<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesCardCompanyPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('companies', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('ruc');
        //     $table->integer('number_phone');
        //     $table->string('address', 500);
        //     $table->string('location', 500);
        //     $table->string('about', 500);
        //
        //     $table->timestamps();
        //     $table->engine = 'InnoDB';
        // });

        Schema::create('type_card', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img');
            $table->string('description');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();;
            $table->integer('card_type')->unsigned();;
            $table->string('card_number');
            $table->string('cvv');
            $table->date('due_date');
            $table->string('country');
            $table->string('type_plan');
            $table->string('type_owner');
            $table->string('status');

            $table->foreign('owner_id')->references('id')->on('patients');
            $table->foreign('card_type')->references('id')->on('type_card');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_id')->unsigned();;
            $table->integer('company_id')->unsigned();;
            $table->integer('patient_id')->unsigned();;
            $table->string('stripe_token');
            $table->string('amount');
            $table->string('payment_date');
            $table->date('payment_description');

            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });


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
