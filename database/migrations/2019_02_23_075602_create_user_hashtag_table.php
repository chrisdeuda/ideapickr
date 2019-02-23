<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserHashtagTable extends Migration {

	public function up()
	{
		Schema::create('user_hashtag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('hashtag_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('user_hashtag');
	}
}