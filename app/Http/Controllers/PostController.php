<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        // Fetch only published posts; adjust according to your model
        $posts = Post::where('is_published', true)->latest()->paginate(10);

        return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
        // Optional: block viewing if post is unpublished
        if (!$post->is_published) {
            abort(404); // or 403 if you prefer
        }

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit(Post $post)
    {
        if (Gate::denies('update', $post)) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    //to delete the posts
    public function delete(Post $post)
    {
        if (Gate::denies('delete', $post)) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
