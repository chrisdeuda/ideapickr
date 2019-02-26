<?php

namespace App\Services;
use App\Repositories\TopicRepositoryInterface;
use Validator;

use App\Models\Tag;
use App\Models\User;
use App\Utilities\Tagger as TaggerHelper;



class TopicService{

    protected $topic;

    public function __construct(TopicRepositoryInterface $topic) {
        $this->topic = $topic;

    }

    public function saveTopic( $topic){

        $messages = [
            'title.required' => 'The title field is required.',
        ];

        $validator = Validator::make($topic, [
            'title' => 'required|max:255',
        ], $messages);
        
        if ($validator->fails()) {
            $response =[
                'validation' => false,
                'errors' => $validator->customMessages
            ];
            return (object)$response;
        }
        $new_topic = $this->topic->save($topic);
        $user_id = 1;

        $User = User::find($user_id);
        $is_user_exist = $User != null;
        if ($is_user_exist) {
            //Save tag to users
            $tags = TaggerHelper::getHashTag($topic['title']);
            
            TaggerHelper::tagUser($User, $tags, $user_id);
            $tagTopic = TaggerHelper::tagTopic($new_topic, $tags, $user_id);
        }

        $response =[
            'validation' => true,
            'id' => $new_topic->id,
        ];
        return (object)$response;
    }

    /**
     * It will return a random topic from users topics
     * @return App\Model\Topic
     */
    public function getRandomTopic(){
        $user_id        = 1;
        $User           = User::find($user_id);
        $topics         = $User->topics()->get();
        $topic_count    = $topics->count();
        $random_number  = rand(0,$topic_count - 1);
        $selected_topic = $topics[$random_number];
        return $selected_topic;
    }

    public function getTags(){
        $user_id        = 1;
        return  User::find($user_id)->tags()->get();
    }
}