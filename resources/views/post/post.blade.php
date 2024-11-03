<x-base>
    <x-slot:title>
        View a Post
    </x-slot:title> 
    <div class="w-full max-w-4xl mx-auto p-8 bg-indigo-500 rounded-md text-zinc-100">
        @session('message')
            <div class="m-2 p-2 border-2 border-green-500 rounded-md">
                {{ session('message') }}
            </div>
        @endsession
        <div class="mb-4 p-4 bg-zinc-900 rounded-md">
            <h2 class="mb-1">Created at: {{ $post->created_at }}</h2>
            <h2 class="mb-1">Title: {{ $post->title }}</h2>
            <h2 class="mb-1">Category: {{ $post->category }}</h2>
            <h2 class="mb-1">Author: {{ $post->user->name }}</h2>
            <h2 class="mb-1">Post:</h2>
            <div class="p-4 bg-zinc-600 rounded-md text-sm">
                <p>{{ $post->message }} </p>
            </div>
            <div class="p-4 flex space-x-2 justify-end text-sm">
                <a href="{{ route('post.index', $post) }}" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Return</a>
                @auth
                <a href="{{ route('my_blog.edit', $post) }}" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Edit</a>
                <form style="display:inline" action="{{ route('my_blog.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-zinc-900 rounded-md text-zinc-100 hover:text-red-500">Delete</button>
                </form>
                @endauth
            </div>
            <div>
                <p>Comments</p>
                <ul>
                    @foreach ($comments as $comment)
                    <li>
                        <div class="m-4 p-4 bg-zinc-600 rounded-md text-sm">
                            <p>Author: {{ $comment->user->name }}</p>
                            <p class="text-zinc-100">Comment: {{ $comment->comment }}</p>
                            @auth
                            <div class="p-2 flex space-x-2 justify-end text-sm">
                                <a href="{{ route('comment.edit', $comment) }}" class="text-zinc-100 hover:text-indigo-500">Edit</a>
                                <form style="display:inline" action="{{ route('comment.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-zinc-100 hover:text-red-500">Delete</button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div>
                @auth
                Leave a Comment:
                <form action="{{ route('comment.store', $post) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <textarea id="comment" name="comment" rows="5" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black">
                    </textarea>
                    <button type="submit" class="p-4 bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Submit</button>
                </form>
                @endauth
                @guest
                    <p><a href="{{ route('login.index') }}" class="p-2 bg-zinc-600 rounded-md text-zinc-100 hover:text-indigo-500">Log in</a> to leave a comment.</p>
                @endguest
            </div>
        </div>
    </div>

</x-base>

