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
