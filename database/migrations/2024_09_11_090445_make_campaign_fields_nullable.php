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
        Schema::table('campaigns', function (Blueprint $table) {
            // تحديث حقل platform لإضافة الخيارات الجديدة
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

            // جعل الحقول الأخرى قابلة لأن تكون nullable
            $table->string('area')->nullable()->change();
            $table->string('location_url')->nullable()->change();
            $table->string('creatives_url')->nullable()->change();
            $table->string('campaign_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            // إعادة الحقول إلى حالتها السابقة إذا احتجت لذلك
            $table->enum('platform', ['facebook', 'instagram', 'tiktok', 'twitter', 'linkedin'])->nullable(false)->change();
            $table->string('area')->nullable(false)->change();
            $table->string('location_url')->nullable(false)->change();
            $table->string('creatives_url')->nullable(false)->change();
            $table->string('campaign_type')->nullable(false)->change();
        });
    }
};
