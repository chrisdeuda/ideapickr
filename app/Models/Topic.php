<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    

    protected $fillable = [
        'user_id', 
        'title',
        'description' ,
        'status' ,
        'is_selected',
        'categories' ,
    ];
    protected $with = array('tags', );
    /**
     * Get the user from the owner of topic.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    
}
