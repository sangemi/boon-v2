<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatWaveStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('wave_status', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('suit_id')->unsigned();

            $table->string('title');
            $table->text('explain');

            $table->string('status_show');
            $table->string('status_inner');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('wave_status')->insert([
                'suit_id' => '0',
                'title' => '신청확인중',
                'explain' => "
<p>최소인원이 모이면 순서대로 일괄 접수됩니다. 기다려주세요.</p>
                ",
                'status_inner' => '신청확인중',
                'status_show' => '신청확인중',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wave_status');
    }
}
