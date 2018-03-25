<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
