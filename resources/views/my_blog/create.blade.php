<x-base>
    <x-slot:title>
        Crete a Post
    </x-slot:title> 
    
    <div class="w-full max-w-4xl mx-auto p-8 bg-indigo-500 rounded-md text-zinc-100">
        <form action="{{ route('my_blog.store') }}" method="POST" novalidate>
            @csrf
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
                    value="{{ old('title') }}"
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
            <div class="mb-4 form-group">
                <label for="category1" class="block text-sm font-bold mb-2">Category1</Label>
                <select name="category1[]" class="form-control selectpicker text-black" multiple data-live-search="true">
                    <option value="" disabled selected>Choose Category</option>
                    @foreach ($categories1 as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-bold mb-2">Content</Label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black"
                >
                {{ old('message') }}
                </textarea>
            </div>
            <a href="{{ route('my_blog.index',) }}" 
                class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
                Cancel
            </a>
            <button type="submit"
                class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">
                Submit
            </button>
        </form>
    </div>


</x-base>
