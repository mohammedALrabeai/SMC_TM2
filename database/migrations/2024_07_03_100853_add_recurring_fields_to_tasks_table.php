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
        Schema::table('tasks', function (Blueprint $table) {
            $table->boolean('is_recurring')->default(false); // تم إضافة هذا الحقل الجديد
            $table->integer('recurrence_interval_days')->nullable(); // تم إضافة هذا الحقل الجديد لفاصل التكرار بالأيام
            $table->datetime('next_occurrence')->nullable(); // تم إضافة هذا الحقل الجديد
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('is_recurring'); // حذف الحقل في حالة الرجوع عن التغييرات
            $table->dropColumn('recurrence_interval_days'); // حذف الحقل في حالة الرجوع عن التغييرات
            $table->dropColumn('next_occurrence'); // حذف الحقل في حالة الرجوع عن التغييرات
        });
    }
};
