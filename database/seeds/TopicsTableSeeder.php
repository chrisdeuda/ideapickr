<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            'user_id' => 1,
            'title' => 'Topics 1 #category1',
            'description' => 'The quick brown fox jumps over the lazy dog',
            'status' => 'todo',
            'is_selected' => 0,
            'categories' => 'empty',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('topics')->insert([
            'user_id' => 1,
            'title' => 'Topics 2 #category1',
            'description' => 'The quick brown fox jumps over the lazy dog 2',
            'status' => 'todo',
            'is_selected' => 0,
            'categories' => 'empty',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
