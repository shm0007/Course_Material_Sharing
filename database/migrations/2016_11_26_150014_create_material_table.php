<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('material_type');
            $table->string('file_name');
            $table->string('uploader_type');
            $table->string('taking_dept');
            $table->string('session');
            $table->string('user_name');
            $table->foreign('user_name')->references('name')->on('users');
            $table->integer('reg_no');
            $table->foreign('reg_no')->references('reg_no')->on('student');
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('course');

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('material');
    }
}
