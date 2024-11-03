<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header class="grid grid-cols-1 items-center py-5">
                <nav class="flex flex-1 m-auto">
                    <a href="{{ route('post.index') }}" class="rounded-md px-3 py-2 text-zinc-100 hover:cursor-pointer hover:text-indigo-500">
                        Posts
                    </a>
                    @auth
                    <a href="{{ route('my_blog.index') }}" class="rounded-md px-3 py-2 text-zinc-100 hover:cursor-pointer hover:text-indigo-500">
                        My blog
                    </a>
                    <a href="{{ url('logout') }}" class="rounded-md px-3 py-2 text-zinc-100 hover:cursor-pointer hover:text-indigo-500">
                        Log out
                    </a>
                    @endauth
                    @guest
                    <a href="{{ route('login.index') }}" class="rounded-md px-3 py-2 text-zinc-100 hover:cursor-pointer hover:text-indigo-500">
                        Log in
                    </a>
                    <a href="{{ route('register.index') }}" class="rounded-md px-3 py-2 text-zinc-100 hover:cursor-pointer hover:text-indigo-500">
                        Register
                    </a>
                    @endguest
                    <a href="{{ url('profile') }}"class="rounded-md px-3 py-2 text-zinc-100 hover:cursor-pointer hover:text-indigo-500">
                        Profile
                    </a>
                </nav>
    </header>

    <main>
        <div class="grid grid-cols-2 items-center gap-2 pb-5">
            <h2 class="text-2xl font-semibold m-auto text-white">{{ $title }}</h2>
        </div>

        {{ $slot }}

    </main>

    <footer class="grid grid-cols-1 items-center py-10">
        <div class="flex flex-1 m-auto">
            <h2>Created by Emils G</h2>
        </div>
    </footer>
</body>
</html>