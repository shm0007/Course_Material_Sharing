<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherEnrolment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('teacher_enrolment', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_name');
    

            $table->string('course_code');

           // $table->integer('reg_no');
           // $table->foreign('reg_no')->references('reg_no')->on('student');
           
            $table->string('offered_dept');
            $table->string('taking_dept');
            $table->string('taking_session');
        


        

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
         Schema::drop('teacher_enrolment');
        //
    }
}
