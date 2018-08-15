<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationServiceQuantityCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_service_quantity_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('q_q_s_id')->unsigned();
            $table->foreign('q_q_s_id')->references('id')->on('quotation_service_quantities');
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
        Schema::dropIfExists('quotation_service_quantity_comments');
    }
}
