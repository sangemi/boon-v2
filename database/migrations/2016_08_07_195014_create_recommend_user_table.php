<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommend_users', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('category');
            $table->string('cate_number');
            $table->integer('recommending_id')->unsigned();
            $table->integer('recommended_id')->unsigned();

            $table->string('ip_addr');
            $table->string('status'); // result_message

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
        Schema::drop('recommend_users');
    }
}
