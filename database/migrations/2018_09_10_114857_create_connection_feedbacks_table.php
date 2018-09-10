<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('connection_id')->unsigned();
            $table->foreign('connection_id')->references('id')->on('connections');
            $table->integer('feedback_form_id')->unsigned();
            $table->foreign('feedback_form_id')->references('id')->on('feedback_forms');
            $table->longText('values');
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
        Schema::dropIfExists('connection_feedbacks');
    }
}
