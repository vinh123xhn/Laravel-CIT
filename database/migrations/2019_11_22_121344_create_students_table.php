<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
             $table->string('code', 255)->comment('mã học sinh');
            $table->string('name', 100);
            $table->integer('district_id')->comment('id quận/huyện')->nullable();
            $table->integer('commune_id')->comment('id phường/xã')->nullable();
            $table->integer('school_id')->comment('id phường/xã')->nullable();
            $table->string('address', 255)->comment('địa chỉ');
            $table->integer('gender')->comment('giới tính')->nullable();
            $table->string('birthday', 255)->comment('ngày sinh');
            $table->string('name_of_dad', 255)->comment('tên bố');
            $table->string('name_of_mom', 255)->comment('tên mẹ');
            $table->string('phone', 20)->comment('số điện thoại trường')->nullable();
            $table->integer('type_school')->comment('phân cấp trường học')->nullable();
            $table->integer('type_of_student')->comment('phân loại học sinh')->nullable();
            $table->integer('level')->comment('Lớp')->nullable();
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
        Schema::dropIfExists('students');
    }
}
