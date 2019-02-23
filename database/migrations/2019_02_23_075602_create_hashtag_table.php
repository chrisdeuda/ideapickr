<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHashtagTable extends Migration {

	public function up()
	{
		Schema::create('hashtag', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('hashtag');
	}
}