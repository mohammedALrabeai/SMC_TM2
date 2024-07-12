<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDayOffColumnTypeInEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emps', function (Blueprint $table) {
            // Change the column type from enum to string
            $table->string('day_off')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emps', function (Blueprint $table) {
            // Change the column type back to enum
            // You might need to specify the enum values again
            $table->enum('day_off', ['value1', 'value2', 'value3'])->change();
        });
    }
}
