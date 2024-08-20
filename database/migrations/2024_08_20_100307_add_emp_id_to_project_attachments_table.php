<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_emp_id_to_project_attachments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpIdToProjectAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::table('project_attachments', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id')->nullable()->after('is_in_own_drive'); // Add 'emp_id' field
            $table->foreign('emp_id')->references('id')->on('emps')->onDelete('set null'); // Assuming 'users' table has 'id' field
        });
    }

    public function down()
    {
        Schema::table('project_attachments', function (Blueprint $table) {
            $table->dropForeign(['emp_id']);
            $table->dropColumn('emp_id');
        });
    }
}
