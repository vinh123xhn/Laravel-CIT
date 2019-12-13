<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_school')->comment('Phân loại')->nullable();
            $table->string('name', 100);
            $table->string('code', 100);
            $table->integer('district_id')->comment('id quận/huyện')->nullable();
            $table->integer('commune_id')->comment('id phường/xã')->nullable();
            $table->string('address', 255)->comment('địa chỉ');
            $table->string('phone', 20)->comment('số điện thoại trường')->nullable();
            $table->string('email', 100)->comment('email')->nullable();
            $table->string('website', 100)->comment('website')->nullable();
            $table->string('acreage', 100)->comment('diện tích mặt đất')->nullable();
            $table->string('name_of_principal', 100)->comment('tên hiệu trưởng')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
