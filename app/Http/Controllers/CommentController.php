<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        $validated['user_id'] = request()->user()->id;
        $validated['post_id'] = $request->post_id;

        Comment::create([
            'comment' => trim(strip_tags($validated['comment'])),
            'user_id' => $validated['user_id'],
            'post_id' => $validated['post_id'],
        ]);

        return to_route('post.show', $request->post_id)->with('message', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        if ($comment->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('comment.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== request()->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'comment' => 'required',
        ]);

        $comment->update([
            'comment' => trim(strip_tags($validated['comment'])),
        ]);

        return to_route('post.show', $comment->post_id)->with('message', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== request()->user()->id) {
            abort(403);
        }

        $commentToDelete = COMMENT::find($comment->id);
        $commentToDelete->delete();
        return to_route('post.show', $comment->post_id)->with('message', 'Comment deleted successfully.');
    }
}
