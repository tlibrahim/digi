<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToCrmUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_users' ,function($t) {
            $t->longText('http_cred')->nullable();
            $t->string('ip_address')->nullable();
            $t->integer('added_by')->nullable();
            $t->integer('edited_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_users' ,function($t) {
            $t->dropCOlumns('http_cred');
            $t->dropCOlumns('ip_address');
            $t->dropCOlumns('added_by');
            $t->dropCOlumns('edited_by');
        });
    }
}
