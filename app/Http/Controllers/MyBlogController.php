<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class MyBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()
            ->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('my_blog.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Post::$categories;
        $categories1 = Category::all();
        return view('my_blog.create', ['categories' => $categories, 'categories1' => $categories1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->except('categories'));
        $post->categories()->attach($request['categories']);

        return to_route('my_blog.index')->with('message', 'Post added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            abort(403);
        }

        return view('my_blog.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $my_blog)
    {
        if ($my_blog->user_id !== request()->user()->id) {
            abort(403);
        }

        $categories = Post::$categories;
        return view('my_blog.edit', ['post' => $my_blog, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $my_blog)
    {
        if ($my_blog->user_id !== request()->user()->id) {
            abort(403);
        }

        $my_blog->update($request->validated());

        return to_route('my_blog.index')->with('message', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $my_blog)
    {
        if ($my_blog->user_id !== request()->user()->id) {
            abort(403);
        }

        $my_blog->delete();

        return to_route('my_blog.index')->with('message', 'Post deleted successfully.');
    }
}
