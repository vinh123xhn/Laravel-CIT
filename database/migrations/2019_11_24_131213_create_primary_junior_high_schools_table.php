<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimaryJuniorHighSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_junior_high_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->comment('id trường học')->nullable();
            $table->integer('type_school')->comment('Phân loại')->nullable();
            $table->integer('total_of_class')->comment('tổng số lớp')->default(0)->nullable();
            $table->integer('total_of_1')->comment('tổng số lớp 1')->default(0)->nullable();
            $table->integer('total_of_2')->comment('tổng số lớp 2')->default(0)->nullable();
            $table->integer('total_of_3')->comment('tổng số lớp 3')->default(0)->nullable();
            $table->integer('total_of_4')->comment('tổng số lớp 4')->default(0)->nullable();
            $table->integer('total_of_5')->comment('tổng số lớp 5')->default(0)->nullable();
            $table->integer('total_of_6')->comment('tổng số lớp 6')->default(0)->nullable();
            $table->integer('total_of_7')->comment('tổng số lớp 7')->default(0)->nullable();
            $table->integer('total_of_8')->comment('tổng số lớp 8')->default(0)->nullable();
            $table->integer('total_of_9')->comment('tổng số lớp 9')->default(0)->nullable();
            $table->integer('total_classroom')->comment('tổng số phòng học')->default(0)->nullable();
            $table->integer('total_function_room')->comment('tổng số phòng chức năng')->default(0)->nullable();
            $table->integer('total_subject_room')->comment('tổng số phòng bộ môn')->default(0)->nullable();
            $table->integer('total_device_full')->comment('tổng số trang thiết bị tối thiểu đầy đủ')->default(0)->nullable();
            $table->integer('total_device_not_full')->comment('tổng số trang thiết bị tối thiểu không đầy đủ')->default(0)->nullable();
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
