<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalFormInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_form_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('in_add_more')->default(0);
            $table->string('input_title')->nullable();
            $table->integer('input_name_id')->unsigned();
            $table->foreign('input_name_id')->references('id')->on('input_names');
            $table->integer('proposal_form_id')->unsigned();
            $table->foreign('proposal_form_id')->references('id')->on('proposal_forms');
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
        Schema::dropIfExists('proposal_form_inputs');
    }
}
