<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatWaveClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wave_clients', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->integer('suit_id')->unsigned();
            $table->integer('status_id')->unsigned();

            $table->string('name');
            $table->string('jumin');
            $table->string('addr');
            $table->string('addr2');
            $table->string('postcode');

            $table->string('phone');

            $table->string('data01');
            $table->string('data02');
            $table->string('data03');
            $table->string('data04');

            $table->text('data05'); /*5~10까지는 text로 쓰자*/
            $table->string('data06');
            $table->text('data07');
            $table->string('data08');
            $table->string('data09');
            $table->string('data10');

            $table->string('data11');
            $table->string('data12');
            $table->string('data13');
            $table->string('data14');
            $table->string('data15');

            $table->string('bank_name');
            $table->string('bank_number');
            $table->string('bank_owner');


            $table->string('status_inner');
            $table->string('status_show');

            $table->string('withdraw');

            $table->string('bigo');

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
        Schema::drop('wave_clients');
    }
}
