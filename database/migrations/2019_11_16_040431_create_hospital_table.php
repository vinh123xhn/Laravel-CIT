<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('type');
            $table->integer('bed')->comment('số giường bệnh')->nullable();
            $table->integer('address')->comment('địa chỉ')->nullable();
            $table->string('phone', 15)->comment('số điện thoại')->nullable();
            $table->string('email')->comment('email')->nullable();
            $table->string('website')->comment('website')->nullable();
            $table->integer('total')->comment('tổng số nhân lực')->nullable();
            $table->integer('count_doctor')->comment('số bác sĩ')->nullable();
            $table->integer('count_pharmacist')->comment('số dược sĩ')->nullable();
            $table->integer('count_nursing')->comment('số điều dưỡng')->nullable();
            $table->integer('count_midwives')->comment('số nữ hộ sinh')->nullable();
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
        Schema::dropIfExists('hospital');
    }
}
