<?php

namespace App\Http\Controllers;

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
        $posts = Post::query()
            ->where('user_id', request()->user()->id)
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:1|max:48',
            'category' => 'required',
            'message' => 'required|min:12|max:800',
        ]);

        $validated['user_id'] = request()->user()->id;

        Post::create([
            'title' => trim(strip_tags($validated['title'])),
            'category' => $validated['category'],
            'message' => trim(strip_tags($validated['message'])),
            'user_id' => $validated['user_id'],
        ]);

        $post = Post::latest()->first();

        $post->categories()->attach($request['category1']);
    
        return to_route('my_blog.index')->with('message', 'Post added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $my_blog)
    {
        if ($my_blog->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('my_blog.show', ['post' => $my_blog]);
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
    public function update(Request $request, Post $my_blog)
    {
        if ($my_blog->user_id !== request()->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'message' => 'required',
        ]);

        $my_blog->update([
            'title' => trim(strip_tags($validated['title'])),
            'category' => $validated['category'],
            'message' => trim(strip_tags($validated['message'])),
        ]);
    
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

        $postToDelete = POST::find($my_blog->id);
        $postToDelete->delete();
        return to_route('my_blog.index')->with('message', 'Post deleted successfully.');
    }
}
