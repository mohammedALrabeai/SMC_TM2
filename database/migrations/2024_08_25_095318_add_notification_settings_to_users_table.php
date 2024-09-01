<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('enable_whatsapp_notifications')->default(false);
            $table->boolean('enable_group_notifications')->default(false);
            $table->boolean('enable_employee_notifications')->default(false);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('enable_whatsapp_notifications');
            $table->dropColumn('enable_group_notifications');
            $table->dropColumn('enable_employee_notifications');
        });
    }
};
