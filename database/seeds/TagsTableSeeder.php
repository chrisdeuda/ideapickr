<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_counts = 5;
        for ($i = 0; $i <= $tags_counts; $i++) {
            DB::table('tags')->insert([
                'user_id' => 1,
                'name' => "tag".$i,
            ]);
        } 
        // Create relationshiop of the tags
        DB::table('tag_topic')->insert([
            'topic_id' => 1,
            'tag_id' => 1,
        ]);
        DB::table('tag_topic')->insert([
            'topic_id' => 1,
            'tag_id' => 2,
        ]);

        for ($i = 1; $i <= $tags_counts; $i++) {
            DB::table('tag_user')->insert([
                'user_id' => 1,
                'tag_id' => $i,
            ]);
        } 

    }
}
