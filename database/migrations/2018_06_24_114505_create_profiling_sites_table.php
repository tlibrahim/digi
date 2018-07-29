<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilingSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiling_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profiling_id')->nullable();
            $table->integer('content_id')->nullable();
            $table->integer('technology_id')->nullable();
            $table->integer('look_id')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('profiling_sites');
    }
}
