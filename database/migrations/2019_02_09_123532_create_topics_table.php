<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->string('title', 500);
			$table->string('description', 250)->nullable();
			$table->string('status', 10);
			$table->boolean('is_done')->default(0);
			$table->boolean('is_selected')->default(0);
			$table->boolean('is_inprogress')->default(0);
            $table->string('categories')->nullable();
            $table->dateTimeTz('done_at')->nullable();;
            $table->timestamps();

            // Relationship
            // $table->foreign('user_id')
            //         ->referrences('users')
            //         ->on('id')
            //         ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
