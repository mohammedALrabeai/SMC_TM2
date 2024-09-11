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
        Schema::create('project_plan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_plan_id')->constrained('project_plans');
            $table->foreignId('emp_id')->constrained('emps');
            $table->text('captions');
            $table->text('des');
            $table->string('hashtag');
            $table->enum('type', ['post', 'video', 'reel', 'image']);
            $table->string('platform'); // Use multi-select if needed in your UI
            $table->enum('status', ['pending', 'posted', 'canceled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_plan_details');
    }
};