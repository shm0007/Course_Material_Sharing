<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion', function (Blueprint $table) {
           
            $table->increments('id')->unsigned();
            $table->string('discussion_type');
            $table->string('course_code');
            $table->string('offered_dept');

            $table->string('taking_dept');
            $table->string('session');
            $table->string('status');
            
            
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
        Schema::drop('discussion');
    }
}
