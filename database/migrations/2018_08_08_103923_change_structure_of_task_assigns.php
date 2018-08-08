<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStructureOfTaskAssigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_assigns' ,function($t) {
            $t->dropColumn('title');
            $t->dropColumn('description');
            $t->dropColumn('client_plan_id');
            $t->boolean('is_done')->default(0);
            $t->integer('quotation_id')->unsigned();
            $t->foreign('quotation_id')->references('id')->on('quotations');
            $t->integer('service_id')->unsigned();
            $t->foreign('service_id')->references('id')->on('services');
            $t->integer('serialize_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_assigns' ,function($t) {
            $t->dropColumn('is_done');
            $t->dropForeign('task_assigns_quotation_id_foreign');
            $t->dropColumn('quotation_id');
            $t->dropForeign('task_assigns_service_id_foreign');
            $t->dropColumn('service_id');
            $t->dropColumn('serialize_level');
            $t->string('title')->nullable();
            $t->longText('description')->nullable();
            $t->integer('client_plan_id')->nullable();
        });
    }
}
