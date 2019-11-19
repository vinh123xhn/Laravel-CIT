<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('school_id');
            $table->integer('type');
            $table->string('birthday');
            $table->string('phone', 15)->comment('số điện thoại')->nullable();
            $table->string('address', 150)->comment('địa chỉ')->nullable();
            $table->string('degree', 150)->comment('trình độ/ bằng cấp')->nullable();
            $table->string('position', 150)->comment('chức vụ')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
