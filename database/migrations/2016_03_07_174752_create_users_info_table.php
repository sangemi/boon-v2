<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users_info', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); //참조 무결성 강제. 외래 키 제한


            $table->string('nick');
            $table->string('phone');
            /* 나중 열자....
             * $table->string('addr_post');      // 별도 table 만들어서..
            $table->string('company_id');   // 별도 table 만들어서..
            $table->string('team_id');      // 메인 소속
            $table->string('team_list');    // 메인 소속*/

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

        Schema::drop('users_info');


    }
}
