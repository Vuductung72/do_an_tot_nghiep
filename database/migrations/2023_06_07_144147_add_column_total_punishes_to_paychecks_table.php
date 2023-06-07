<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paychecks', function (Blueprint $table) {
            $table->string('total_punishes')->after('total_allowances')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paychecks', function (Blueprint $table) {
            $table->dropColumn('total_punishes');
        });
    }
};
