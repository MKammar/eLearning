<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('a_id');
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('id')->on('users');
            $table->unsignedBigInteger('t_id');
            $table->foreign('t_id')->references('id')->on('users');
            $table->string('title');
            $table->dateTime('startDatetime');
            $table->dateTime('endDatetime');
            $table->string('grade')->nullable();
            $table->boolean('isSubmitted')->default(0);
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
        Schema::dropIfExists('assignments');
    }
}
