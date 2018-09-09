<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->longText('description')->nullable();
            $table->string('total')->nullable();
            $table->string('total_discount')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_deleted')->default(0);
            $table->string('offer_type')->nullable();
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
        Schema::dropIfExists('offers_histories');
    }
}
