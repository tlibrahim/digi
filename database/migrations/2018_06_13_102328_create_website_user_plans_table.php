<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_user_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id')->nullable();
            $table->integer('website_user_id')->nullable();
            $table->string('plan_section')->nullable();
            $table->string('plan_title')->nullable();
            $table->string('plan_leads')->nullable();
            $table->string('plan_price')->nullable();
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
        Schema::dropIfExists('website_user_plans');
    }
}
