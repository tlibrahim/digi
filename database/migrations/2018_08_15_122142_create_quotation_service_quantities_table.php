<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationServiceQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_service_quantities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quotation_id')->unsigned();
            $table->foreign('quotation_id')->references('id')->on('quotations');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->integer('qnt_lvl')->nullable();
            $table->boolean('completed')->default(0);
            $table->boolean('is_approved')->default();
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
        Schema::dropIfExists('quotation_service_quantities');
    }
}
