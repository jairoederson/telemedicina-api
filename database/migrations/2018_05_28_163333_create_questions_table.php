<?php
use App\Question;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id')->unsigned();
            $table->string('question');
            $table->string('answer')->nullable();
            $table->string('email');
            $table->string('status')->default(Question::QUESTION_NO_ANSWERED);
            $table->string('state')->default(Question::QUESTION_ACTIVE);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_questions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
