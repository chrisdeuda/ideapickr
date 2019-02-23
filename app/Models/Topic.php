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
    /**
     * Get the user from the owner of topic.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
