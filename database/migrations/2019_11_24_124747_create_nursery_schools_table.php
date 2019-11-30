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
            $table->integer('school_id')->comment('id trường học')->nullable();
            $table->integer('type_school')->comment('Phân loại')->nullable();
            $table->integer('total_of_nursery_class')->comment('tổng số lớp nhóm trẻ')->default(0)->nullable();
            $table->integer('total_of_nursery_3_12')->comment('tổng số lớp nhóm 3 - 12 tháng')->default(0)->nullable();
            $table->integer('total_of_nursery_13_24')->comment('tổng số lớp nhóm 13 - 24 tháng')->default(0)->nullable();
            $table->integer('total_of_nursery_25_36')->comment('tổng số lớp nhóm 25 - 36 tháng')->default(0)->nullable();
            $table->integer('total_of_nursery_collect')->comment('tổng số lớp nhóm ghép')->default(0)->nullable();
            $table->integer('total_of_kindergarten_class')->comment('tổng số lớp mẫu giáo')->default(0)->nullable();
            $table->integer('total_of_kindergarten_3_4')->comment('tổng số lớp 3-4 tuổi')->default(0)->nullable();
            $table->integer('total_of_kindergarten_4_5')->comment('tổng số lớp 4-5 tuổi')->default(0)->nullable();
            $table->integer('total_of_kindergarten_5_6')->comment('tổng số lớp 5-6 tuổi')->default(0)->nullable();
            $table->integer('total_of_kindergarten_collect')->comment('tổng số lớp ghép')->default(0)->nullable();

            $table->integer('total_of_nursery_student')->comment('tổng số học sinh nhà trẻ')->default(0)->nullable();
            $table->integer('total_of_nursery_3_12_student')->comment('tổng số học sinh nhà trẻ 3 - 12 tháng')->default(0)->nullable();
            $table->integer('total_of_nursery_13_24_student')->comment('tổng số học sinh nhà trẻ 13 - 24 tháng')->default(0)->nullable();
            $table->integer('total_of_nursery_25_36_student')->comment('tổng số học sinh nhà trẻ 25 - 36 tháng')->default(0)->nullable();
            $table->integer('total_of_nursery_collect_student')->comment('tổng số học sinh lớp ghép nhà trẻ')->default(0)->nullable();

            $table->integer('total_of_kindergarten_student')->comment('tổng số học sinh mẫu giáo')->default(0)->nullable();
            $table->integer('total_of_kindergarten_3_4_student')->comment('tổng số học sinh mẫu giáo 3 - 4 tuổi')->default(0)->nullable();
            $table->integer('total_of_kindergarten_4_5_student')->comment('tổng số học sinh mẫu giáo 4 - 5 tuổi')->default(0)->nullable();
            $table->integer('total_of_kindergarten_5_6_student')->comment('tổng số học sinh mẫu giáo 5 - 6 tuổi')->default(0)->nullable();
            $table->integer('total_of_kindergarten_collect_student')->comment('tổng số học sinh lớp ghép mẫu giáo')->default(0)->nullable();

            $table->integer('total_of_all_employees')->comment('tổng số nhân sự nhà trẻ')->default(0)->nullable();
            $table->integer('total_of_manager')->comment('tổng số cán bộ quản lý')->default(0)->nullable();
            $table->integer('total_of_nursery_teacher')->comment('tổng số giáo viên nhà trẻ')->default(0)->nullable();
            $table->integer('total_of_kindergarten_teacher')->comment('tổng số giáo viên mẫu giáo')->default(0)->nullable();
            $table->integer('total_of_employees')->comment('tổng số nhân viên')->default(0)->nullable();

            $table->integer('total_classroom_nursery')->comment('tổng số phòng học nhà trẻ')->default(0)->nullable();
            $table->integer('total_classroom_kindergarten')->comment('tổng số phòng học mẫu giáo')->default(0)->nullable();
            $table->integer('total_function_room')->comment('tổng số phòng chức năng')->default(0)->nullable();
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
