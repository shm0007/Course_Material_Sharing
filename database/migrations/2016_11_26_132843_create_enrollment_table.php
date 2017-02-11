<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_no');
            $table->foreign('reg_no')->references('reg_no')->on('student');
            $table->string('course_code');
            $table->string('offered_dept');
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
        Schema::drop('enrollment');
    }
}
