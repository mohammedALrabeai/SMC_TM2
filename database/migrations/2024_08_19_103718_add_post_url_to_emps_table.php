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
        Schema::table('emps', function (Blueprint $table) {
            $table->string('post_url')->nullable()->after('sheet_api_url'); // يمكنك تعديل "اسم_العمود_الذي_يجب_أن_يأتي_بعده"
        });
    }

    public function down()
    {
        Schema::table('emps', function (Blueprint $table) {
            $table->dropColumn('post_url');
        });
    }

};
