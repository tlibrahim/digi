<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilingSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiling_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profiling_id')->unsigned();
            $table->foreign('profiling_id')->references('id')->on('profilings');
            $table->integer('management_id')->unsigned();
            $table->foreign('management_id')->references('id')->on('managements');
            $table->integer('post_type_id')->unsigned();
            $table->foreign('post_type_id')->references('id')->on('post_types');
            $table->integer('promote_status_id')->unsigned();
            $table->foreign('promote_status_id')->references('id')->on('promote_statuses');
            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('contents');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('campaign_link')->nullable();
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
        Schema::dropIfExists('profiling_socials');
    }
}
