<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_memos', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('model_name'); // category = WaveClient
            $table->string('model_id');

            $table->string('memo_type'); // 전화, 문자, 직접
            $table->text('memo');
            $table->string('reg_id'); // 입력자
            $table->string('in_charge_id'); // 담당자
            $table->string('in_charge_check'); // 담당자 확인여부 : done, postpone

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
        Schema::drop('user_memos');
    }
}
