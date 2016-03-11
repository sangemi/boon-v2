<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcmailWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccmail_works', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); // 연결된 user id없을수도 있음.

            $table->integer('sample_id')->unsigned();
            $table->string('sender_id');
            $table->string('sender_name');
            $table->string('sender_addr');
            $table->string('receiver_id');
            $table->string('receiver_name');
            $table->string('receiver_addr');

            $table->string('title');
            $table->text('content');

            $table->string('status_inner');
            $table->string('status_show');

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
        Schema::drop('ccmail_works');
    }
}
