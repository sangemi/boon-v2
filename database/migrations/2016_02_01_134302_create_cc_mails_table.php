<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcMailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cc_mails', function(Blueprint $table)
		{
			$table->increments('id');

			$table->char('cate1');
			$table->char('cate2');
			$table->char('cate3');
			$table->text('content');
			$table->integer('user_cnt');
			$table->char('create_id');

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
		Schema::drop('cc_mails');
	}

}
