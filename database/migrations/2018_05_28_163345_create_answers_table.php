<?php
use App\Answer;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('answer');
            $table->string('question');
            $table->string('state')->default(Answer::ANSWER_ACTIVE);
            $table->integer('question_frequency')->unsigned()->default(0);
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
        Schema::dropIfExists('answers');
    }
}
