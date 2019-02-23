<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagTopicTable extends Migration {

	public function up()
	{
		Schema::create('tag_topic', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('topic_id')->unsigned();
			$table->integer('tag_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('tag_topic');
	}
}