<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskApproveCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_approve_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_assign_id')->unsigned();
            $table->foreign('task_assign_id')->references('id')->on('task_assigns');
            $table->integer('user_decline_id')->unsigned();
            $table->foreign('user_decline_id')->references('id')->on('crm_users');
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('task_approve_comments');
    }
}
