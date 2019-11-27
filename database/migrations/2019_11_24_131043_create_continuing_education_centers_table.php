<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContinuingEducationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continuing_education_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->comment('id trường học')->nullable();
            $table->integer('type_school')->comment('Phân loại')->nullable();
            $table->integer('total_of_class')->comment('tổng số lớp')->default(0)->nullable();
            $table->integer('total_of_xmc')->comment('tổng số lớp xóa mù chữ')->default(0)->nullable();
            $table->integer('total_of_gdttskbc')->comment('tổng số lớp giáo dục tiếp tục sau khi biết chữ')->default(0)->nullable();
            $table->integer('total_of_6')->comment('tổng số lớp 6')->default(0)->nullable();
            $table->integer('total_of_7')->comment('tổng số lớp 7')->default(0)->nullable();
            $table->integer('total_of_8')->comment('tổng số lớp 8')->default(0)->nullable();
            $table->integer('total_of_9')->comment('tổng số lớp 9')->default(0)->nullable();
            $table->integer('total_of_10')->comment('tổng số lớp 10')->default(0)->nullable();
            $table->integer('total_of_11')->comment('tổng số lớp 11')->default(0)->nullable();
            $table->integer('total_of_12')->comment('tổng số lớp 12')->default(0)->nullable();
            $table->integer('total_classroom')->comment('tổng số phòng học')->default(0)->nullable();
            $table->integer('total_function_room')->comment('tổng số phòng chức năng')->default(0)->nullable();
            $table->integer('total_subject_room')->comment('tổng số phòng bộ môn')->default(0)->nullable();
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
        Schema::dropIfExists('continuing_education_center');
    }
}
