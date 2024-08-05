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
        Schema::table('projects', function (Blueprint $table) {
            // إضافة الحقول للجدول
            $table->string('facebook_user')->nullable();
            $table->string('insta_user')->nullable();
            $table->string('tiktok_user')->nullable();
            $table->string('instagram_user')->nullable();
            $table->string('snap_user')->nullable();
            $table->string('x_user')->nullable();

            $table->string('facebook_pass')->nullable();
            $table->string('insta_pass')->nullable();
            $table->string('tiktok_pass')->nullable();
            $table->string('instagram_pass')->nullable();
            $table->string('snap_pass')->nullable();
            $table->string('x_pass')->nullable();

            $table->string('store_url')->nullable();
            $table->string('store_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // إزالة الحقول من الجدول
            $table->dropColumn([
                'facebook_user',
                'insta_user',
                'tiktok_user',
                'instagram_user',
                'snap_user',
                'x_user',
                'facebook_pass',
                'insta_pass',
                'tiktok_pass',
                'instagram_pass',
                'snap_pass',
                'x_pass',

                'store_url',
                'store_user'
            ]);
        });
    }
};
