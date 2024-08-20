<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('project_attachments', function (Blueprint $table) {
            $table->renameColumn('in_own_drive', 'is_in_own_drive');
        });
    }

    /**
     * التراجع عن الترحيل.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_attachments', function (Blueprint $table) {
            $table->renameColumn('is_in_own_drive', 'in_own_drive');
        });
    }};
