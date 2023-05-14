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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('position');
            $table->string('experience');
            $table->string('quantity');
            $table->string('wage');
            $table->unsignedTinyInteger('type_work')->default(1)->comment('0 : Part-time', '1: Fulltime');
            $table->unsignedTinyInteger('type')->default(0)->comment('0 : Ẩn', '1: Hiện');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitments');
    }
};
