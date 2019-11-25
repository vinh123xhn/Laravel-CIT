<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNurserySchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nursery_schools', function (Blueprint $table) {
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
            $table->integer('total_of_nursery_class')->comment('tổng số lớp nhóm trẻ')->nullable();
            $table->integer('total_of_nursery_3_12')->comment('tổng số lớp nhóm 3 - 12 tháng')->nullable();
            $table->integer('total_of_nursery_12_24')->comment('tổng số lớp nhóm 12 - 24 tháng')->nullable();
            $table->integer('total_of_nursery_25_36')->comment('tổng số lớp nhóm 25 - 36 tháng')->nullable();
            $table->integer('total_of_nursery_collect')->comment('tổng số lớp nhóm ghép')->nullable();
            $table->integer('total_of_kindergarten_class')->comment('tổng số lớp mẫu giáo')->nullable();
            $table->integer('total_of_kindergarten_3_4')->comment('tổng số lớp 3-4 tuổi')->nullable();
            $table->integer('total_of_kindergarten_4_5')->comment('tổng số lớp 4-5 tuổi')->nullable();
            $table->integer('total_of_kindergarten_5_6')->comment('tổng số lớp 5-6 tuổi')->nullable();
            $table->integer('total_of_kindergarten_collect')->comment('tổng số lớp ghép')->nullable();
            $table->integer('total_classroom_nursery')->comment('tổng số phòng học nhà trẻ')->nullable();
            $table->integer('total_classroom_kindergarten')->comment('tổng số phòng học mẫu giáo')->nullable();
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
        Schema::dropIfExists('nursery_schools');
    }
}
