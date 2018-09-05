<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconToProposalFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposal_forms', function (Blueprint $table) {
            $table->string('icon')->nullable();
            $table->boolean('susspend')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposal_forms', function (Blueprint $table) {
            $table->dropColumn('icon');
            $table->dropColumn('susspend');
        });
    }
}
