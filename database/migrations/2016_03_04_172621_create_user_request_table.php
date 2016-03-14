<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_requests', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); //참조 무결성 강제. 외래 키 제한

            $table->string('model_name');
            $table->integer('model_id')->unsigned();

            $table->string('title'); // 리스트에서 보일 내용. 나중 자동생성됨..
            $table->text('ask_origin'); // 요청사항
            $table->text('ask_modify'); // 요청사항을 전화 등을 통해 1차 요원이 정리

            $table->text('request_paper'); // (직접작성한) 신청자료

            $table->text('answer_ask'); // 요청사항에 대한 답변
            // $table->text('answer_request'); // 작업결과물은 file 또는 result_table로


            $table->string('status_inner');
            $table->string('status_show');

            // memo 라는 객체를 여기저기 다 붙여쓰자
            // 내부적으로 팀원들끼리 주고받는 메모가 있는 반면
            // 의뢰인과 내부팀끼리 주고받는 메모가 있을 수 있다.

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
        Schema::drop('user_requests');
    }
}
