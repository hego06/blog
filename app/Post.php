<?php

namespace App;

use App\Photo;
use App\Category;
use Carbon\Carbon;
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

    function photos()
    {
        return $this->hasMany(Photo::class);
    }

    function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at','<=',Carbon::now())        
            ->latest('published_at');
    }

    function setCategoryIdAttribute($category_id){
        $this->attributes['category_id'] = Category::find($category_id) ? $category_id : Category::create(['name' => $category_id])->id;
    }

    function syncTags($tags)
    {
        $tagsId = [];

        foreach($tags as $tag){
            $tagsId [] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        }

        $this->tags()->sync($tagsId);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($post) { // before delete() method call this
             $post->tags()->detach();
             //se debe recorrer cada elemento para que se ejecute la eliminacion
            foreach($post->photos as $photo){
                $photo->delete();
            }
             
        });
    }
}
