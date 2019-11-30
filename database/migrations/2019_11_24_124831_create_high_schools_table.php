<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->comment('id trường học')->nullable();
            $table->integer('type_school')->comment('Phân loại')->nullable();
            $table->integer('total_of_class')->comment('tổng số lớp')->default(0)->nullable();
            $table->integer('total_of_grade_10')->comment('tổng số lớp 10')->default(0)->nullable();
            $table->integer('total_of_grade_11')->comment('tổng số lớp 11')->default(0)->nullable();
            $table->integer('total_of_grade_12')->comment('tổng số lớp 12')->default(0)->nullable();

            $table->integer('total_of_student')->comment('tổng số học sinh')->default(0)->nullable();
            $table->integer('total_of_student_10')->comment('tổng số học sinh lớp 10')->default(0)->nullable();
            $table->integer('total_of_student_11')->comment('tổng số học sinh lớp 11')->default(0)->nullable();
            $table->integer('total_of_student_12')->comment('tổng số học sinh lớp 12')->default(0)->nullable();

            $table->integer('total_of_all_employees')->comment('tổng số nhân sự')->default(0)->nullable();
            $table->integer('total_of_manager')->comment('tổng số cán bộ quản lý')->default(0)->nullable();
            $table->integer('total_of_teacher')->comment('tổng số giáo viên')->default(0)->nullable();
            $table->integer('total_of_employees')->comment('tổng số nhân viên')->default(0)->nullable();

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
        Schema::dropIfExists('high_schools');
    }
}
