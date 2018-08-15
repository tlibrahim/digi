<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQQSIdToTaskAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_assigns', function (Blueprint $table) {
            $table->integer('q_q_s_id')->unsigned();
            $table->foreign('q_q_s_id')->references('id')->on('quotation_service_quantities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_assigns', function (Blueprint $table) {
            $table->dropForeign('task_assigns_q_q_s_id_foreign');
            $table->dropColumn('q_q_s_id');
        });
    }
}
