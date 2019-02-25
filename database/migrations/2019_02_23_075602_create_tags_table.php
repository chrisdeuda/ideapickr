<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {

	public function up()
	{
		Schema::create('tags', function(Blueprint $table) {
			$table->integer('id', true);
			$table->integer('user_id')->unsigned();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('tags');
	}
}