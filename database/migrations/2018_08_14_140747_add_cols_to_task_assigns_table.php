<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToTaskAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_assigns', function (Blueprint $table) {
            $table->boolean('is_approved')->default(0);
            $table->integer('user_approved_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_assigns', function (Blueprint $table) {
            $table->dropColumn('is_approved');
            $table->dropColumn('user_approved_id');
        });
    }
}
