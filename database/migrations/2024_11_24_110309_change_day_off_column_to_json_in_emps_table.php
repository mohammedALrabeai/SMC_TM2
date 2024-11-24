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
            $table->json('temp_day_off')->nullable();
        });
    }
    
    public function down(): void
    {
        Schema::table('emps', function (Blueprint $table) {
            $table->dropColumn('temp_day_off');
        });
    }
    

 
};
