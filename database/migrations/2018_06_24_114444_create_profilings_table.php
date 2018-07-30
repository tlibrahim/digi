<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('potential_id')->unsigned();
            $table->foreign('potential_id')->references('id')->on('companies');
            $table->string('logo')->nullable();
            $table->string('approach')->nullable();
            $table->longText('intro')->nullable();

            $table->boolean('seo_check')->default(0);
            $table->integer('seo_level_id')->unsigned();
            $table->foreign('seo_level_id')->references('id')->on('levels');
            $table->longText('seo_keywords')->nullable();

            $table->boolean('sem_check')->default(0);
            $table->integer('sem_level_id')->unsigned();
            $table->foreign('sem_level_id')->references('id')->on('levels');
            $table->longText('sem_keywords')->nullable();

            $table->boolean('gdn_check')->default(0);
            $table->integer('gdn_level_id')->unsigned();
            $table->foreign('gdn_level_id')->references('id')->on('levels');
            $table->longText('gdn_keywords')->nullable();
            
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
        Schema::dropIfExists('profilings');
    }
}
