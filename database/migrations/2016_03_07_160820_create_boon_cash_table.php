<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoonCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('boon_cash', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('boon_status_id')->unsigned();
            $table->foreign('boon_status_id')->references('id')->on('boon_status'); //참조 무결성 강제. 외래 키 제한


            $table->string('title');

            $table->string('pg_company');
            $table->string('pg_payid');
            $table->string('pg_card_url');
            $table->string('pg_status');

            $table->integer('pay_amt');
            $table->string('pay_memo');
            //$table->timestamp('date'); created_at을 씀.

            $table->boolean('confirmed'); // 최종 입금확인 여부.

            $table->string('status_inner');
            $table->string('status_show');

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
        Schema::drop('boon_cash');
    }
}
