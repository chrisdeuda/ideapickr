<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{

    protected $table = 'tags';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function topics()
    {
        return $this->belongsToMany('App\Models\Topic');
    }

}