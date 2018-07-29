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
            $table->integer('profiling_id')->nullable();
            $table->integer('management_id')->nullable();
            $table->integer('post_type_id')->nullable();
            $table->integer('promote_status_id')->nullable();
            $table->integer('content_id')->nullable();
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
