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
            $table->increments('id');
            $table->string('discussion_type');
            $table->string('taking_dept');
            $table->string('session');
            $table->string('status');
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
        Schema::drop('discussion');
    }
}
