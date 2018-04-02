<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = ['url','post_id'];

    //protected $guarded = [];
    public $timestamps = false;

    protected static function boot() {
        parent::boot();

        static::deleting(function($photo) { // before delete() method call this
            $newUrl= str_replace('/storage/','',$photo->url);
            Storage::disk('public')->delete($newUrl);
        });
    }
}
