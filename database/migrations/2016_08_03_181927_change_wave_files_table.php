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
        Schema::table('wave_files', function ($table) {
            $table->integer('title_no', 2)->after('file_size');
            $table->string('title')->after('file_size');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wave_files', function ($table) {
            $table->dropColumn('title');
        });
    }
}
