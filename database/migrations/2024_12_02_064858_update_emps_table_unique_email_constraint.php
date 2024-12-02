<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmpsTableUniqueEmailConstraint extends Migration
{
    public function up()
    {
        Schema::table('emps', function (Blueprint $table) {
            // إزالة القيد الفريد الحالي على عمود email
            $table->dropUnique('emps_email_unique');

            // إضافة قيد فريد مركب يشمل email و user_id
            $table->unique(['email', 'user_id'], 'emps_email_user_id_unique');
        });
    }

    public function down()
    {
        Schema::table('emps', function (Blueprint $table) {
            // إزالة القيد الفريد المركب
            $table->dropUnique('emps_email_user_id_unique');

            // إعادة القيد الفريد على عمود email
            $table->unique('email');
        });
    }
}
