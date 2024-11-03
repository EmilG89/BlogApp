<x-base>
    <x-slot:title>
        Edit a Post
    </x-slot:title> 
    
    <form action="{{ route('my_blog.update', $post) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div class="m-2 p-2 border-2 border-rose-500 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-4">
            <label for="title" Elass="block text-sm font-bold mb-2">Title</label> 
            <input type="text" id="title" name="title" required 
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black"
                value="{{ $post->title }}"
            >
        </div> 
        <div class="mb-4 form-group">
            <label for="category" class="block text-sm font-bold mb-2">Category</Label>
            <select name="category" class="form-control selectpicker text-black" multiple data-live-search="true">
                <option value="" disabled selected>Choose Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="message" class="block text-sm font-bold mb-2">Content</Label>
            <textarea id="message" name="message" rows="5" required
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black"
            >
            {{ $post->message }}
            </textarea>
        </div>
        <a href="{{ route('my_blog.show', $post) }}" 
            class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
            Cancel
        </a>
        <button type="submit"
            class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
            Submit
        </button>
    </form>

</x-base>
