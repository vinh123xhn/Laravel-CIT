<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('birthday');
            $table->string('address');
            $table->integer('type')->comment('phân loại trẻ');
            $table->integer('weight')->comment('cân nặng theo kg');
            $table->integer('height')->comment('chiều cao theo cm');
            $table->string('comment', 300)->comment('nhận xét của bác sĩ');
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
        Schema::dropIfExists('children_malnutrition');
    }
}
