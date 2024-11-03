<x-base>
    <x-slot:title>
        View a Post
    </x-slot:title> 
    <div class="w-full max-w-4xl mx-auto p-8 bg-indigo-500 rounded-md text-zinc-100">
        <div class="mb-4 p-4 bg-zinc-900 rounded-md">
            <h2 class="mb-1">Created at: {{ $post->created_at }}</h2>
            <h2 class="mb-1">Title: {{ $post->title }}</h2>
            <h2 class="mb-1">Category: {{ $post->category }}</h2>
            <h2 class="mb-1">Author: {{ $post->user->name }}</h2>
            <p> {{ $post->message }} </p>
            <div class="flex space-x-2 justify-end">
                <a href="{{ route('my_blog.index') }}" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Return</a>
                <a href="{{ route('my_blog.edit', $post) }}" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Edit</a>
                <form style="display:inline" action="{{ route('my_blog.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-red-500">Delete</button>
                </form>
            </div>
            <div>
                <p>Comments</p>
                <ul>
                    @foreach ($post->comments as $comment)
                    <li>
                        <div class="m-4 p-4 bg-zinc-600 rounded-md text-sm">
                            <p>Author: {{ $comment->user->name }}</p>
                            <p class="text-zinc-100">Comment: {{ $comment->comment }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</x-base>
