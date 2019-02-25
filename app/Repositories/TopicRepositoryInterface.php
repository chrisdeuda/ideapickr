<?php 
namespace App\Repositories;

interface TopicRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function get($post_id);

    /**
     * Get's all topics.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a topic.
     *
     * @param int
     */
    public function delete($topic_id);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($topic_id, array $topic_data);

    public function save(array $topic_data);

    public function findBy($field, $value, $columns = array('*'));

}