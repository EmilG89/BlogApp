<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function() {
    return redirect('post');
});

Route::get('/search', function(Request $request) {

    $validated = $request->validate([
        'x' => 'required|max:40',
    ]);

    $search = strip_tags($validated['x']);
    $match = Post::where('title', 'like', "%$search%")
        ->orWhere('message', 'like', "%$search%")
        ->orderBy('created_at', 'desc')
        ->paginate(15);

    return view('post.home', ['posts' => $match]);

});

Route::resource('post', PostController::class);

Route::resource('comment', CommentController::class);

Route::resource('my_blog', MyBlogController::class);

Route::resource('register', RegisterController::class);

Route::resource('login', LoginController::class);

Route::get('/logout', function() {

    return redirect('login')->with(Auth::logout());

});

Route::get('/profile', function() {
    return view('authenticate.profile');
})->middleware('auth');


