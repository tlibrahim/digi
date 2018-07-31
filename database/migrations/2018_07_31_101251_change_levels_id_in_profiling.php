<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLevelsIdInProfiling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profilings' ,function($t) {
            $t->integer('seo_level_id')->nullable()->change();
            $t->integer('sem_level_id')->nullable()->change();
            $t->integer('gdn_level_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            $t->integer('seo_level_id')->change();
            $t->integer('sem_level_id')->change();
            $t->integer('gdn_level_id')->change();
    }
}
