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
        Schema::table('emps', function (Blueprint $table) {
            // إضافة حقل sheet_api_url إلى الجدول
            $table->text('sheet_api_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emps', function (Blueprint $table) {
            // إزالة حقل sheet_api_url من الجدول
            $table->dropColumn('sheet_api_url');
        });
    }
};
