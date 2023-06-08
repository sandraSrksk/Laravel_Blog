<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    // Display all blog posts
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', ['posts' => $posts]);
    }

    // Show the form for creating a new blog post
    public function create()
    {
        return view('blog.create');
    }

    // Store a newly created blog post in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create a new post
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // Additional fields can be set here
        $post->save();

        // Redirect to the post's page or the index page
        return redirect()->route('blog.show', ['post' => $post->id]);
    }

    // Show a specific blog post
    public function show(Post $post)
    {
        return view('blog.show', ['post' => $post]);
    }

    // Show the form for editing a blog post
    public function edit(Post $post)
    {
        return view('blog.edit', ['post' => $post]);
    }

    // Update the specified blog post in the database
    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Update the post
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // Additional fields can be updated here
        $post->save();

        // Redirect to the post's page or the index page
        return redirect()->route('blog.show', ['post' => $post->id]);
    }

    // Delete the specified blog post from the database
    public function destroy(Post $post)
    {
        $post->delete();

        // Redirect to the index page or any other desired page
        return redirect()->route('blog.index');
    }
}

