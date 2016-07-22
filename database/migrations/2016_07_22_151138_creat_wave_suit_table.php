<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatWaveSuitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wave_suits', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('explain');
            $table->string('defender');

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
        Schema::drop('wave_suits');
    }
}
