<?php

namespace App\Repositories;
use App\Models\Topic;
use App\Repositories\TopicRepositoryInterface;

class TopicRepository implements TopicRepositoryInterface{
    /**
     * Get's a topic by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($topic_id)
    {
        return Topic::find($topic_id);
    }

    /**
     * Get's all topics.
     *
     * @return mixed
     */
    public function all()
    {
        return Topic::all();
    }

    /**
     * Deletes a topic.
     *
     * @param int
     */
    public function delete($topic_id)
    {
        Topic::destroy($topic_id);
    }

    /**
     * Updates a topic.
     *
     * @param int
     * @param array
     */
    public function update($topic_id, array $topic_data)
    {
        Topic::find($topic_id)->update($topic_data);
    }

    /**
     * Create a topic
     * @param int
     * @param array
     */
    public function save( array $topic_data){

        $default_data =array(
            "status" => "todo",
            "is_selected" => "0",
            "categories" => "empty",
            "user_id" => 1, // @TODO - make it dynamic
        );
        $new_topic_data = $default_data + $topic_data;


        $Topic = Topic::create($new_topic_data);
        return $Topic->id;
    }



    /**
     * Search a topic.
     *
     * @param int
     * @param array
     */
    public function findBy($field, $value, $columns = array('*')){
        return Topic::where($field, $value)->get();
    }

}