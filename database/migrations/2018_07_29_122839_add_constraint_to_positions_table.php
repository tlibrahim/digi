<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintToPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('positions', function (Blueprint $table) {
            $table->integer('departement_id')->unsigned()->change();
            $table->foreign('departement_id')->references('id')->on('departments')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('positions', function (Blueprint $table) {
            $table->integer('departement_id')->nullable()->change();
            $table->dropForeign('positions_departement_id_foreign');
        });
    }
}
