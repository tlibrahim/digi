<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteForeignKeysFromProfiling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profilings' ,function($t) {
            $t->dropForeign('profilings_seo_level_id_foreign');
            $t->dropForeign('profilings_sem_level_id_foreign');
            $t->dropForeign('profilings_gdn_level_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profilings' ,function($t) {
            $t->foreign('seo_level_id')->references('id')->on('levels');
            $t->foreign('sem_level_id')->references('id')->on('levels');
            $t->foreign('gdn_level_id')->references('id')->on('levels');
        });
    }
}
