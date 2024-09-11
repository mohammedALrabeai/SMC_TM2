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
        Schema::table('project_plans', function (Blueprint $table) {
            $table->foreignId('moderator_id')->nullable()->change();
            $table->foreignId('copy_writer_id')->nullable()->change();
            $table->foreignId('media_buyer_id')->nullable()->change();
            $table->foreignId('graphic_designer_id')->nullable()->change();
            $table->foreignId('video_designer_id')->nullable()->change();
            $table->foreignId('programmer_id')->nullable()->change();
            $table->foreignId('seo_specialist_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_plans', function (Blueprint $table) {
            $table->foreignId('moderator_id')->nullable(false)->change();
            $table->foreignId('copy_writer_id')->nullable(false)->change();
            $table->foreignId('media_buyer_id')->nullable(false)->change();
            $table->foreignId('graphic_designer_id')->nullable(false)->change();
            $table->foreignId('video_designer_id')->nullable(false)->change();
            $table->foreignId('programmer_id')->nullable(false)->change();
            $table->foreignId('seo_specialist_id')->nullable(false)->change();
        });
    }
};
