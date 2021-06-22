<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('q_id');
            $table->unsignedBigInteger('a_id');
            $table->foreign('a_id')->references('a_id')->on('assignments');
            $table->mediumText('question');
            $table->mediumText('choice1');
            $table->mediumText('choice2');
            $table->mediumText('choice3')->nullable();
            $table->mediumText('choice4')->nullable();
            $table->mediumText('answer')->comment('student answer')->nullable();
            $table->mediumText('correctAnswer');
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
        Schema::dropIfExists('questions');
    }
}
