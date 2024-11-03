<x-base>
    <x-slot:title>
        Comment editing
    </x-slot:title> 
    <div class="w-full max-w-4xl mx-auto p-8 bg-indigo-500 rounded-md text-zinc-100">
        @session('message')
            <div class="bg-success">
                {{ session('message') }}
            </div>
        @endsession
        <div class="mb-4 p-4 bg-zinc-900 rounded-md">
            <h2 class="mb-1">Created at: {{ $comment->post->created_at }}</h2>
            <h2 class="mb-1">Title: {{ $comment->post->title }}</h2>
            <h2 class="mb-1">Category: {{ $comment->post->category }}</h2>
            <h2 class="mb-1">Author: {{ $comment->user->name }}</h2>
            <h2 class="mb-1">Post:</h2>
            <div class="p-4 bg-zinc-600 rounded-md text-sm">
                <p>{{ $comment->post->message }} </p>
            </div>
            <div>
                Edit your Comment:
                <form action="{{ route('comment.update', $comment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <textarea id="comment" name="comment" rows="5" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black">
                        {{ $comment->comment }}
                    </textarea>
                    <button type="submit" class="p-4 bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Submit</button>
                    <a href="{{ route('post.show', $comment->post) }}" class="p-4 bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Return</a>
                </form>
            </div>
        </div>
    </div>

</x-base>



