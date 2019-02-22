<?php

namespace App\Services;
use App\Repositories\TopicRepositoryInterface;
use Validator;



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

        $topic_id = $this->topic->save($topic);

        $response =[
            'validation' => true,
            'id' => $topic_id,
        ];
        return (object)$response;
    }
}