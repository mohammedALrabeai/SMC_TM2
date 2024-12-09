<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // إزالة المفتاح الخارجي
            $table->dropForeign(['sender_id']);
        });

        Schema::table('tasks', function (Blueprint $table) {
            // تعديل العمود ليكون قابلاً للقيمة NULL
            $table->foreignId('sender_id')->nullable()->change();
        });

        Schema::table('tasks', function (Blueprint $table) {
            // إعادة إضافة المفتاح الخارجي
            $table->foreign('sender_id')->references('id')->on('emps')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // إزالة المفتاح الخارجي
            $table->dropForeign(['sender_id']);
        });

        Schema::table('tasks', function (Blueprint $table) {
            // إعادة العمود ليكون غير قابل للقيمة NULL
            $table->foreignId('sender_id')->nullable(false)->change();
        });

        Schema::table('tasks', function (Blueprint $table) {
            // إعادة إضافة المفتاح الخارجي
            $table->foreign('sender_id')->references('id')->on('emps')->onDelete('cascade');
        });
    }
};
