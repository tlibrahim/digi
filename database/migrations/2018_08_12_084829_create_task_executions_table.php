<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_executions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_assign_id')->unsigned();
            $table->foreign('task_assign_id')->references('id')->on('task_assigns');
            $table->string('input');
            $table->string('type');
            $table->longText('value');
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
        Schema::dropIfExists('task_executions');
    }
}
