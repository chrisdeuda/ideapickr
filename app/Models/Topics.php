<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    

    /**
     * Get the user from the owner of topic.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
