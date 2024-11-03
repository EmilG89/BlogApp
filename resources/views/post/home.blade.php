<x-base>
    <x-slot:title>
        Posts
    </x-slot:title>

        <section>
            <div class="w-full max-w-4xl mx-auto p-8 bg-indigo-500 rounded-md text-zinc-100">
                <div class="flex flex-1 gap-1 m-auto py-5">
                    <form action="/search" method="GET">
                        <input type="search" name="x" placeholder="Search.." class="text-black"/>
                        <button type="submit" class="bg-zinc-900 px-2 py-1 rounded-md hover:text-indigo-500">Search</button>
                    </form>
                    <a href="{{ route('post.index') }}" class="bg-zinc-900 px-2 py-1 rounded-md hover:text-indigo-500">Return</a>
                </div>
                @if(count($posts) == 0)
                    <p>No match for search</p>
                @endif
                @foreach ($posts as $post)
                <div class="mb-4 p-4 bg-zinc-900 rounded-md">
                    <h2 class="mb-1">Title: {{ $post->title }}</h2>
                    <h2 class="mb-1">Category: {{ $post->category }}</h2>
                    <h2 class="mb-1">Author: {{ $post->user->name }}</h2>
                    <p> {{ Str::words($post->message, 30) }} </p>
                    <div class="p-2 flex space-x-2 justify-end">
                        <a href="{{ route('post.show', $post) }}" class="text-zinc-100 hover:cursor-pointer hover:text-indigo-500">View</a>
                    </div>
                </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </section>

</x-base>

