<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    function store(Post $post)
    {
        $this->validate(request(),[
            'photo' => 'required|image|max:2048'
        ]);
        $photo = request()->file('photo')->store('public');

       return Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id
        ]);
        
    }

    function destroy(Photo $photo)
    {
        $photo->delete();

        $newUrl= str_replace('storage','public',$photo->url);

        Storage::delete($newUrl);

        return back()->with('flash','Imágen eliminada');
    }
}
