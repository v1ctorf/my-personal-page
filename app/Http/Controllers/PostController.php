<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }


    public function index()
    {
        $query = Post::query();

        $query->when(Auth::guest(), function($q){
            return $q->where('visible', 1);
        });

        $posts = $query->orderBy('created_at','desc')->get();

        return view('post.index',['posts' => $posts]);
    }


    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $post = new Post;
        $post->headline = $request->headline;
        $post->subhead = $request->subhead;
        $post->body_copy = $request->body_copy;
        $post->visible = !is_null($request->get('visible'));
        $post->slug = Str::slug($post->headline);
        $post->save();

        return redirect()
            ->route('post.show',['id' => $post->id])
            ->with('message', 'Post created successfully.');
    }


    public function show($criteria)
    {
        $post = Post::where('slug', $criteria)->orWhere('id', $criteria)->first();

        return view('post.show',compact('post'));
    }


    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $post->headline = $request->headline;
        $post->subhead = $request->subhead;
        $post->body_copy = $request->body_copy;
        $post->visible = !is_null($request->get('visible'));
        $post->slug = Str::slug($post->headline);
        $post->save();

        return redirect()
            ->route('post.show',['id' => $post->id])
            ->with('message', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('blog')
            ->with('message','Post has been deleted.');
    }
}
