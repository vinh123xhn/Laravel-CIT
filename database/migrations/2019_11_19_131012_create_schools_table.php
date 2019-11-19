<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('type');
            $table->integer('address')->comment('địa chỉ')->nullable();
            $table->string('phone', 15)->comment('số điện thoại')->nullable();
            $table->string('email')->comment('email')->nullable();
            $table->string('website')->comment('website')->nullable();
            $table->integer('total')->comment('tổng số nhân lực')->nullable();
            $table->integer('count_teacher')->comment('số bác sĩ')->nullable();
            $table->integer('count_student')->comment('số dược sĩ')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
