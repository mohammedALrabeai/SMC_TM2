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
        Schema::table('emps', function (Blueprint $table) {
            $table->dropColumn('day_off');
            $table->renameColumn('temp_day_off', 'day_off');
        });
    }
    
    public function down(): void
    {
        Schema::table('emps', function (Blueprint $table) {
            $table->string('day_off')->nullable();
            $table->dropColumn('temp_day_off');
        });
    }
    
};
