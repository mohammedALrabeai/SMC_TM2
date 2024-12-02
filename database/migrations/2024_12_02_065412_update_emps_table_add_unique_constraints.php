<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmpsTableAddUniqueConstraints extends Migration
{
    public function up()
    {
        Schema::table('emps', function (Blueprint $table) {
            // القيد الفريد على email و user_id موجود بالفعل، لا داعي لإضافته مجددًا

            // إضافة قيد فريد مركب على phone و user_id فقط إذا لم يكن موجودًا
            $table->unique(['phone', 'user_id'], 'emps_phone_user_id_unique');
        });
    }

    public function down()
    {
        Schema::table('emps', function (Blueprint $table) {
            // إزالة القيد المركب على phone و user_id
            $table->dropUnique('emps_phone_user_id_unique');
        });
    }
}
