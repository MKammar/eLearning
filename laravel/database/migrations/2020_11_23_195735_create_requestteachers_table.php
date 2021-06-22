<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestteachers', function (Blueprint $table) {
            $table->bigIncrements('r_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('t_id');
            $table->foreign('t_id')->references('t_id')->on('teachers');
            $table->boolean('Response')->default(0);
            $table->date('meetingDate')->nullable();
            $table->time('meetingTime')->nullable();
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
        Schema::dropIfExists('requestteachers');
    }
}
