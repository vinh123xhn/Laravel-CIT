<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create12SchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('1_2_school', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('district_id')->comment('id quận/huyện')->nullable();
            $table->integer('commune_id')->comment('id phường/xã')->nullable();
            $table->string('address', 255)->comment('địa chỉ');
            $table->string('phone', 20)->comment('số điện thoại trường')->nullable();
            $table->string('email', 100)->comment('email')->nullable();
            $table->string('website', 100)->comment('website')->nullable();
            $table->string('acreage', 100)->comment('diện tích mặt đất')->nullable();
            $table->string('name_of_principal', 100)->comment('tên hiệu trưởng')->nullable();
            $table->integer('type_of_school')->comment('loại trường học')->nullable();
            $table->integer('total_of_class')->comment('tổng số lớp')->nullable();
            $table->integer('total_of_1')->comment('tổng số lớp 1')->nullable();
            $table->integer('total_of_2')->comment('tổng số lớp 2')->nullable();
            $table->integer('total_of_3')->comment('tổng số lớp 3')->nullable();
            $table->integer('total_of_4')->comment('tổng số lớp 4')->nullable();
            $table->integer('total_of_5')->comment('tổng số lớp 5')->nullable();
            $table->integer('total_of_6')->comment('tổng số lớp 6')->nullable();
            $table->integer('total_of_7')->comment('tổng số lớp 7')->nullable();
            $table->integer('total_of_8')->comment('tổng số lớp 8')->nullable();
            $table->integer('total_of_9')->comment('tổng số lớp 9')->nullable();
            $table->integer('total_classroom')->comment('tổng số phòng học')->nullable();
            $table->integer('total_function_room')->comment('tổng số phòng chức năng')->nullable();
            $table->integer('total_subject_room')->comment('tổng số phòng bộ môn')->nullable();
            $table->integer('total_device_full')->comment('tổng số trang thiết bị tối thiểu đầy đủ')->nullable();
            $table->integer('total_device_not_full')->comment('tổng số trang thiết bị tối thiểu không đầy đủ')->nullable();
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
        Schema::dropIfExists('1_2_school');
    }
}
