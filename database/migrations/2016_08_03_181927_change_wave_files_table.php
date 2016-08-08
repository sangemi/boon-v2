<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeWaveFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wave_files', function (Blueprint $table) {
            $table->integer('title_no')->after('file_size');
            $table->string('title')->after('file_size');
        }); //->after('file_size')
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wave_files', function (Blueprint $table) {
            $table->dropColumn('title_no');
            $table->dropColumn('title');
        });
    }
}
