<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUserIdToEmpIdInTaskFollowUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_follow_ups', function (Blueprint $table) {
            $table->renameColumn('user_id', 'emp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_follow_ups', function (Blueprint $table) {
            $table->renameColumn('emp_id', 'user_id');
        });
    }
}
