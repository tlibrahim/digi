<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilingProdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiling_prods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profiling_id')->unsigned();
            $table->foreign('profiling_id')->references('id')->on('profilings');
            $table->string('product')->nullable();
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
        Schema::dropIfExists('profiling_prods');
    }
}
