<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToQuotations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotations' ,function($t) {
            $t->boolean('is_collected')->default(0);
            $t->double('total_offer' ,8 ,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotations' ,function($t) {
            $t->dropColumn('is_collected');
            $t->dropColumn('total_offer');
        });
    }
}
