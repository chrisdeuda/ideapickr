<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicHashtagTable extends Migration {

	public function up()
	{
		Schema::create('topic_hashtag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('topic_id')->unsigned();
			$table->integer('hashtag_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('topic_hashtag');
	}
}