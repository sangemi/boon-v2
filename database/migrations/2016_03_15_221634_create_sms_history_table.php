<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_history', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->string('from');
            $table->string('to');
            $table->text('text');
            $table->string('type');
            $table->string('code1'); // group_id
            $table->string('code2'); // message_id
            $table->string('status'); // result_message
            /* Coolsms의 경우. http://www.coolsms.co.kr/SDK_PHP_API_Reference_ko {
              "recipient_number": "01012345678",
              "group_id": "20120217103829612403761364",
              "message_id": "20120217103830163531890062",
              "result_code": "00",
              "result_message": "Success"
            }*/
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
        Schema::drop('sms_history');
    }
}
