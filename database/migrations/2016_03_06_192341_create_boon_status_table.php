<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoonStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 분시스템의 기본정보 저장용 User과 1;1
     */
    public function up()
    {

        Schema::create('boon_status', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->unique(); // 연결된 user id 무조건 하나.
            $table->foreign('user_id')->references('id')->on('users'); //참조 무결성 강제. 외래 키 제한

            $table->integer('boon_cash')->unsigned();
            $table->integer('boon_point')->unsigned();


            $table->string('pay_bank_name');
            $table->string('pay_bank_number');
            $table->string('pay_bank_owner');

            $table->string('pay_possible'); //유료회원/
            $table->string('pay_type');  // 정액결제 여부 ?

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
        Schema::drop('boon_status');
    }
}
