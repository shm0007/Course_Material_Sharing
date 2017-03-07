<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('discussion_entry', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('d_id')->unsigned();
            $table->foreign('d_id')->references('id')->on('discussion');

          
            $table->string('description');
            $table->string('uploader_name');

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
        //
        Schema::drop('discussion_entry');
    }
}
