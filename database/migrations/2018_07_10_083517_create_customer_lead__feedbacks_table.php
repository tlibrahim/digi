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
            $table->integer('company_user_id')->unsigned();
            $table->integer('lead_status_feedback_id')->unsigned();
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
