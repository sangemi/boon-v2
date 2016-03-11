<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcmailSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccmail_samples', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('sample_code');
            $table->string('cate1');
            $table->string('cate2');
            $table->string('cate3');

            $table->text('content');
            $table->integer('used_cnt');
            $table->integer('create_id')->unsigned();;

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
        Schema::drop('ccmail_samples');
    }
}
