<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartementIdToProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals' ,function($table) {
            $table->dropColumn('type');
            $table->integer('departement_id')->unsigned();
            $table->foreign('departement_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals' ,function($table) {
            $table->string('type')->nullable();
            $table->dropColumn('departement_id');
            $table->dropForeign('proposals_departement_id_foreign');
        });
    }
}
