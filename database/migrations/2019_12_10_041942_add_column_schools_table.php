<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `schools` ADD `avatar` VARCHAR(255) NULL COMMENT 'Ảnh đại diện' AFTER `name_of_principal`;");
        DB::statement("ALTER TABLE `schools` ADD `year` VARCHAR(255) NULL COMMENT 'Năm thành lập' AFTER `avatar`;");
        DB::statement("ALTER TABLE `schools` ADD `day_and_year` VARCHAR(255) NULL COMMENT 'Ngày thành lập' AFTER `avatar`;");
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
