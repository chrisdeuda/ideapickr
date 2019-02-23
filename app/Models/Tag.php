<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{

    protected $table = 'tags';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\Models\Users');
    }

    public function topics()
    {
        return $this->belongsToMany('App\Models\Topics');
    }

}