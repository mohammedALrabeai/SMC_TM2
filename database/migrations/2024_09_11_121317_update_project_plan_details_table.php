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
        Schema::table('project_plan_details', function (Blueprint $table) {
            // تعديل الحقول لجعلها nullable
            $table->text('des')->nullable()->change();
            $table->string('hashtag')->nullable()->change();
            $table->enum('type', ['post', 'video', 'reel', 'image'])->nullable()->change();
            
            // تعديل platform لإضافة الخيارات الجديدة وجعلها nullable
            $table->enum('platform', [
                'facebook', 
                'instagram', 
                'whatsapp', 
                'telegram', 
                'snapchat', 
                'tiktok', 
                'youtube', 
                'twitter', 
                'linkedin', 
                'other'
            ])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_plan_details', function (Blueprint $table) {
            // التراجع عن التعديلات
            $table->text('des')->nullable(false)->change();
            $table->string('hashtag')->nullable(false)->change();
            $table->enum('type', ['post', 'video', 'reel', 'image'])->nullable(false)->change();
            
            // التراجع عن التعديلات على platform
            $table->enum('platform', ['facebook', 'instagram', 'tiktok', 'twitter', 'linkedin'])->nullable(false)->change();
        });
    }
};
