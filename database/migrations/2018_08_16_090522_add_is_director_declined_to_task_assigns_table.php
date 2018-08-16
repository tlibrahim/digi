<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsDirectorDeclinedToTaskAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_assigns', function (Blueprint $table) {
            $table->boolean('is_director_declined')->default(0);
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
            $table->dropColumn('is_director_declined');
        });
    }
}
