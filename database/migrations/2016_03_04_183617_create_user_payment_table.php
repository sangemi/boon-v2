<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); // 연결된 user id없을수도 있음.

            $table->integer('user_request_id')->unsigned();
            $table->foreign('user_request_id')->references('id')->on('users'); //참조 무결성 강제. 외래 키 제한

            $table->string('pay_amount');
            $table->string('pay_content');
            $table->timestamp('pay_date');
            $table->string('pay_type');  // 은행 카드

            $table->text('worked_paper'); // (직접작성한) 신청자료

            $table->text('answer_ask'); // 요청사항에 대한 답변
            // $table->text('answer_request'); // 작업결과물은 file 또는 result_table로


            $table->string('status_inner');
            $table->string('status_show');

            $table->string('pg_company');
            $table->string('pg_payid');
            $table->string('pg_status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_payments');
    }
}
