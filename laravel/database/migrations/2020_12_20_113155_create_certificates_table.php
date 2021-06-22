<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('certificate_id');
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('id')->on('users');
            $table->unsignedBigInteger('t_id');
            $table->foreign('t_id')->references('id')->on('users');
            $table->boolean('isgenerated')->default(0);;
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
        Schema::dropIfExists('certificates');
    }
}
