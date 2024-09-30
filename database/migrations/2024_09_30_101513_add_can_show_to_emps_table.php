<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCanShowToEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emps', function (Blueprint $table) {
            $table->boolean('can_show')->default(false)->after('sheet_api_url'); // Specify the column after which you want to add 'can_show'
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
            $table->dropColumn('can_show');
        });
    }
}
