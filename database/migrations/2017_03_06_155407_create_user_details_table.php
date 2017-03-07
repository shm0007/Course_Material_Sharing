<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_details', function (Blueprint $table) {

            
            $table->increments('id')->unsigned();
            $table->string('user_name');
           // $table->string('email');

            $table->foreign('user_name')->references('name')->on('users');
          //  $table->foreign('email')->references('email')->on('users');
            $table->string('dept_name');
            $table->integer('reg_no')->unique();
            $table->string('session');
            
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
        Schema::drop('user_details');
    }
}
