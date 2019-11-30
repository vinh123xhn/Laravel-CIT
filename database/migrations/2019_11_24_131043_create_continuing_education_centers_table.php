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
            $table->integer('total_of_grade_class')->comment('tổng số lớp')->default(0)->nullable();
            $table->integer('total_of_grade_xmc')->comment('tổng số lớp xóa mù chữ')->default(0)->nullable();
            $table->integer('total_of_grade_gdttskbc')->comment('tổng số lớp giáo dục tiếp tục sau khi biết chữ')->default(0)->nullable();
            $table->integer('total_of_grade_6')->comment('tổng số lớp 6')->default(0)->nullable();
            $table->integer('total_of_grade_7')->comment('tổng số lớp 7')->default(0)->nullable();
            $table->integer('total_of_grade_8')->comment('tổng số lớp 8')->default(0)->nullable();
            $table->integer('total_of_grade_9')->comment('tổng số lớp 9')->default(0)->nullable();
            $table->integer('total_of_grade_10')->comment('tổng số lớp 10')->default(0)->nullable();
            $table->integer('total_of_grade_11')->comment('tổng số lớp 11')->default(0)->nullable();
            $table->integer('total_of_grade_12')->comment('tổng số lớp 12')->default(0)->nullable();

            $table->integer('total_of_student')->comment('tổng số học sinh')->default(0)->nullable();
            $table->integer('total_of_student_xmc')->comment('tổng số học sinh xmc')->default(0)->nullable();
            $table->integer('total_of_student_gdttskbc')->comment('tổng số học sinh gdttskbc')->default(0)->nullable();
            $table->integer('total_of_student_6')->comment('tổng số học sinh lớp 6')->default(0)->nullable();
            $table->integer('total_of_student_7')->comment('tổng số học sinh lớp 7')->default(0)->nullable();
            $table->integer('total_of_student_8')->comment('tổng số học sinh lớp 8')->default(0)->nullable();
            $table->integer('total_of_student_9')->comment('tổng số học sinh lớp 9')->default(0)->nullable();
            $table->integer('total_of_student_10')->comment('tổng số học sinh lớp 10')->default(0)->nullable();
            $table->integer('total_of_student_11')->comment('tổng số học sinh lớp 11')->default(0)->nullable();
            $table->integer('total_of_student_12')->comment('tổng số học sinh lớp 12')->default(0)->nullable();
            $table->integer('total_of_student_work_8')->comment('tổng số học sinh nghề 8')->default(0)->nullable();
            $table->integer('total_of_student_work_11')->comment('tổng số học sinh nghề 11')->default(0)->nullable();
            $table->integer('total_of_student_it')->comment('tổng số học viên tin học')->default(0)->nullable();
            $table->integer('total_of_student_international')->comment('tổng số học viên ngoại ngữ')->default(0)->nullable();

            $table->integer('total_of_all_employees')->comment('tổng số nhân sự')->default(0)->nullable();
            $table->integer('total_of_manager')->comment('tổng số cán bộ quản lý')->default(0)->nullable();
            $table->integer('total_of_teacher')->comment('tổng số giáo viên')->default(0)->nullable();
            $table->integer('total_of_employees')->comment('tổng số nhân viên')->default(0)->nullable();

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
