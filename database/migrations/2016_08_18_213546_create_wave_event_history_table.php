<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaveEventHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wave_event_history', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('explain');
            $table->integer('start_client_id')->unsigned();
            $table->integer('end_client_id')->unsigned();
            $table->text('client_id_list');

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
        Schema::drop('wave_event_history');
    }
}
