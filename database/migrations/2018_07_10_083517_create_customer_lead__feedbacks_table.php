<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLeadFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_lead__feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_lead_id')->unsigned();
            $table->foreign('customer_lead_id')->references('id')->on('customer_leads');
            $table->integer('company_user_id')->unsigned();
            $table->foreign('company_user_id')->references('id')->on('company__users');
            $table->integer('lead_status_feedback_id')->unsigned();
            $table->foreign('lead_status_feedback_id')->references('id')->on('lead__status__feedbacks');
            $table->string('date')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('customer_lead__feedbacks');
    }
}
