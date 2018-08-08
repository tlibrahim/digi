<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProposalToLinkedToQuotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals' ,function($t) {
            $t->dropForeign('proposals_company_id_foreign');
            $t->dropColumn('company_id');
            $t->integer('quotation_id')->unsigned();
            $t->foreign('quotation_id')->references('id')->on('quotations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals' ,function($t) {
            $t->dropForeign('proposals_quotation_id_foreign');
            $t->dropColumn('quotation_id');
            $t->integer('company_id')->unsigned();
            $t->foreign('company_id')->references('id')->on('companies');
        });
    }
}
