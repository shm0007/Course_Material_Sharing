<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('material_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('material_type');
            $table->string('image');
            $table->string('uploader_type');
            $table->string('taking_dept');
            $table->string('offered_dept');
            $table->string('session');
            $table->string('course_code');
            $table->string('user_name');
            $table->foreign('user_name')->references('name')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('material_list');
    }
}
