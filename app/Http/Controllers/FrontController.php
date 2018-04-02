<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()->paginate(5);
        return view('front.post.index',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('front.post.show',compact('post'));
    }
}
