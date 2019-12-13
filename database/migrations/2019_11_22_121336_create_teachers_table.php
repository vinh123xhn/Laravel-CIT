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
            $table->string('code', 255)->comment('mã giáo viên');
            $table->string('name', 100);
            $table->integer('district_id')->comment('id quận/huyện')->nullable();
            $table->integer('commune_id')->comment('id phường/xã')->nullable();
            $table->integer('school_id')->comment('id trường học')->nullable();
            $table->integer('gender')->comment('giới tính')->nullable();
            $table->string('address', 255)->comment('địa chỉ');
            $table->string('birthday', 255)->comment('ngày sinh');
            $table->string('phone', 20)->comment('số điện thoại trường')->nullable();
            $table->string('email', 100)->comment('email')->nullable();
            $table->integer('type_school')->comment('phân cấp trường học')->nullable();
            $table->integer('type_teacher')->comment('phân loại giáo viên')->nullable();
            $table->integer('level')->comment('trình độ học vấn')->nullable();
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
