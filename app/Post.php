<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = ['title','excerpt','body','published_at','category_id'];

    public $date = ['published_at'];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
