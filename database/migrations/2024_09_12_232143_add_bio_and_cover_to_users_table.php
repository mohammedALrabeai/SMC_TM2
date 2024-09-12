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
            // تعديل الحقل لإضافة bio و covers إلى enum
            $table->enum('type', ['post', 'video', 'reel', 'image', 'bio', 'covers'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_plan_details', function (Blueprint $table) {
            // التراجع عن التعديلات بحذف bio و covers من enum
            $table->enum('type', ['post', 'video', 'reel', 'image'])->nullable(false)->change();
        });
    }
};
