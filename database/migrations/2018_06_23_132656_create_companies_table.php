<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('isverified')->default(0);
            $table->string('name')->nullable();
            $table->integer('industry_id')->unsigned();
            $table->foreign('industry_id')->references('id')->on('industries');
            $table->text('intro')->nullable();
            $table->string('address')->nullable();
            $table->string('location_credential')->nullable();
            $table->string('location_name')->nullable();
            $table->string('founded')->nullable();
            $table->string('hotline')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('logo')->nullable();
            $table->string('coverphoto')->nullable();
            $table->string('open_from')->nullable();
            $table->string('open_to')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
