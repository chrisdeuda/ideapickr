<?php
namespace App\Utilities;

use App\Models\Tag;
use App\Models\User;
use App\Models\Topic;

class Tagger{
    /**
     * 
     */
    public static function tagTopic($topic, $tags){
        

    }
    
    public static function tagUser($User, $Tags, $user_id){

        $tags_length = count($Tags);

        echo "Count". $tags_length;

        for($i = 0; $i <$tags_length; $i++){

            //Check if it the data doesn't exist
            $tag = Tag::firstOrNew(
                ['name' => $Tags[$i], 'user_id'=>$user_id ]
            );
            $User->tags()->save($tag);
        }
    }

    /**
     * It get the hashtags from the text and return an array of hastags
     * 
     * @param string name
     * 
     * @return array
     */
    public static function getHashTag($name){
        $str = $name;
        preg_match_all('/#([^\s]+)/', $str, $matches);
        return $matches[1];

    }

}
