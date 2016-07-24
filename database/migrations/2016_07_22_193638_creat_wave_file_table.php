<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatWaveFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('wave_files', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned();

            /*$table->string('');*/

            $table->string('source_filename');
            $table->string('uploaded_filename');
            $table->string('file_size');

            $table->text('explain');

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
        Schema::drop('wave_files');
    }
}
