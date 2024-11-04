<x-base>
    <x-slot:title>
        My Blog
    </x-slot:title> 

    <div class="w-full max-w-4xl mx-auto p-8 bg-indigo-500 rounded-md text-zinc-100">
        <div class="mb-10">
            <a href="{{ route('my_blog.create') }}" class="p-4 bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">
                Create a Post
            </a>
        </div>

        @session('message')
            <div class="m-2 p-2 border-2 border-green-500 rounded-md">
                {{ session('message') }}
            </div>
        @endsession

        @foreach ($posts as $post)
        <div class="mb-4 p-4 bg-zinc-900 rounded-md">
            <h2 class="mb-1">Title: {{ $post->title }}</h2>
            <h2 class="mb-1">Category: {{ $post->category }}</h2>
            <h2 class="mb-1">Category1: @foreach ($post->categories as $category) {{ $category->category }}, @endforeach</h2>
            <h2 class="mb-1">Author: {{ $post->user->name }}</h2>
            <p> {{ Str::words($post->message, 30) }} </p>
            <div class="flex space-x-2 justify-end">
                <a href="{{ route('my_blog.show', $post) }}" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">View</a>
                <a href="{{ route('my_blog.edit', $post) }}" class="bg-zinc-900 rounded-md text-zinc-100 hover:text-indigo-500">Edit</a>
                <form style="display:inline" action="{{ route('my_blog.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-zinc-900 rounded-md text-zinc-100 hover:text-red-500">Delete</button>
                </form>
            </div>
        </div>
        @endforeach

        {{ $posts->links() }}

    </div>

</x-base>
