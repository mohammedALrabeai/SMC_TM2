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
        Schema::table('task_statuses', function (Blueprint $table) {
            // إضافة الحقول إلى الجدول
            $table->boolean('is_completely')->default(false);
            $table->boolean('is_cancelled')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_statuses', function (Blueprint $table) {
            // إزالة الحقول من الجدول
            $table->dropColumn(['is_completely', 'is_cancelled']);
        });
    }
};
