<x-base>
    <x-slot:title>
        Register
    </x-slot:title>
    <div class="w-full max-w-4xl mx-auto p-8 bg-zinc-900 rounded-md text-zinc-100">
        <h2 class="text-2xl font-semibold mb-6">Register</h2>
        <form action="{{ route('register.store') }}" method="POST" novalidate>
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
                <label for="name" Elass="block text-sm font-bold mb-2">First and Last name</label> 
                <input type="text" id="name" name="name" required 
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black"
                    value="{{ old('name') }}"
                >
            </div> 
            <div class="mb-4">
                <label for="email" class="block text-sm font-bold mb-2">Your Email</Label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black"
                    value="{{ old('email') }}"
                >
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-bold mb-2">Password</Label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-indigo-500 text-black"
                    value="{{ old('email') }}"
                >    
            </div>
            <button type="submit"
                class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none">
                Register
            </button>
    </div>
</x-base>