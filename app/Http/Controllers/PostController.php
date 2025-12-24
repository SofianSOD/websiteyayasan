<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $latestPosts = Post::where('is_published', true)->where('id', '!=', $post->id)->latest()->take(5)->get();
        return view('posts.show', compact('post', 'latestPosts'));
    }
}
