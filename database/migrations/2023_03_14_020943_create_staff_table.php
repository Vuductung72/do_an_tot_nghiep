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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identityCard');
            $table->string('image');
            $table->string('ethnic');
            $table->string('dateOfBird');
            $table->unsignedTinyInteger('gender')->default(1)->comment('1 : Nam', '2: Nữ');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('idPosition');
            $table->string('idDepartment');
            $table->string('salary');
            $table->string('password');
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
        Schema::dropIfExists('staff');
    }
};
