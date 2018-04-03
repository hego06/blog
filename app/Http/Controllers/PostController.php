<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::permitido()->get();
        
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.post.create', compact('categories','tags'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
        ];

        $this->validate($request, $rules);
        $post = Post::create([
            'title' => $request->get('title'),
            'user_id' => Auth()->user()->id
        ]);

        return redirect()->route('post.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view',$post);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post','categories','tags'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update',$post);

        $rules = [
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'category_id' => 'required'
        ];

        
        $this->validate($request, $rules);
        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return back()->with('flash','El post ha sido gurdado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();   
        return back()->with('flash','El post ha sido eliminado');
    }
}
