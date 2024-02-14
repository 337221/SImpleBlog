<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest('publication_date')->get();
    
        foreach ($posts as $post) {
            $post->preview = substr($post->body, 0, 100) . '...';
        }
    
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'publication_date' => now(),
            'user_id' => auth()->id(),
        ]);
        $post->save();

        return redirect()->route('posts.index');
    }

    public function show(Post $post) {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }
    
}
