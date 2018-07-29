<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrayTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pray_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weekday_en')->nullable();
            $table->string('weekday_ar')->nullable();
            $table->string('date_hijri')->nullable();
            $table->string('date_gregorian')->nullable();
            $table->string('fajr')->nullable();
            $table->string('sunrise')->nullable();
            $table->string('dhuhr')->nullable();
            $table->string('asr')->nullable();
            $table->string('sunset')->nullable();
            $table->string('maghrib')->nullable();
            $table->string('isha')->nullable();
            $table->string('imsak')->nullable();
            $table->string('midnight')->nullable();
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
        Schema::dropIfExists('pray_times');
    }
}
