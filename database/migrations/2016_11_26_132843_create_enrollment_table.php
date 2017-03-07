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

            $table->string('user_name');
            $table->foreign('user_name')->references('name')->on('users');

            $table->string('course_code');

           // $table->integer('reg_no');
           // $table->foreign('reg_no')->references('reg_no')->on('student');
           
            $table->string('offered_dept');
            $table->string('taking_dept');
            $table->string('taking_session');
            $table->string('teacher_name');


        

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
