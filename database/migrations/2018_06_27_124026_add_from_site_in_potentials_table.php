<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFromSiteInPotentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('potentials' ,function($t) {
            $t->boolean('from_site')->default(0);
            $t->integer('from_site_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('potentials' ,function($t) {
            $t->dropColumn('from_site');
            $t->dropColumn('from_site_id');
        });
    }
}
