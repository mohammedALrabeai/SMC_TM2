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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('emp_id')->constrained('emps');
            $table->string('name');
            $table->string('campaign_type'); // awareness, converting, lead generation
            $table->enum('platform', ['facebook', 'instagram', 'tiktok', 'twitter', 'linkedin']);
            $table->decimal('daily_spend', 8, 2);
            $table->string('landing_page_url')->nullable();
            $table->string('sheet_url')->nullable();
            $table->string('area');
            $table->string('location_url');
            $table->string('creatives_url');
            $table->string('asset_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
