<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `teachers` ADD `avatar` VARCHAR(255) NULL COMMENT 'Ảnh đại diện' AFTER `level`;");
        DB::statement("ALTER TABLE `teachers` ADD `year` VARCHAR(255) NULL COMMENT 'Năm bắt đầu làm việc' AFTER `avatar`;");
        DB::statement("ALTER TABLE `teachers` ADD `day_and_year` VARCHAR(255) NULL COMMENT 'Ngày bắt đầu làm việc' AFTER `year`;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
