<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='icon' sizes='32x32' href='https://m.media-amazon.com/images/G/01/imdb/images-ANDW73HA/favicon_desktop_32x32._CB1582158068_.png' />
    <link rel='icon' sizes='167x167' href='https://m.media-amazon.com/images/G/01/imdb/images-ANDW73HA/favicon_iPad_retina_167x167._CB1582158068_.png' />
    <link rel='icon' sizes='180x180' href='https://m.media-amazon.com/images/G/01/imdb/images-ANDW73HA/favicon_iPhone_retina_180x180._CB1582158069_.png' />
    @livewireStyles

    <title>IMDb</title>
</head>
<body class="font-sans text-white" style="background-color: #111">
<nav class="border-b border-gray-800">
    <ul class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-4">
        <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a href="{{route('index')}}">
                    <img class="rounded-lg w-32" src="/images/imdb.jpg" class="w-32" alt="imdb">
                </a>
            </li>
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="{{route('index')}}" class="hover:text-gray-300 hover:underline">Movies</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="#" class="hover:text-gray-300 hover:underline">TV Shows</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{route('posts')}}" class="hover:text-gray-300 hover:underline">Contribute</a>
            </li>
        </ul>
        <ul class="flex flex-col md:flex-row items-center sm:mt-3 md:mt-0">
            <livewire:search-dropdown/>
            @auth
            <div class="md:ml-4 mt-3 md:mt-0">
                <a href="#">
                    <img src="/images/avatar.jpg" alt="avatar" class="hover:opacity-75 transition ease-in-out duration-150 rounded-full w-8 h-8">
                </a>
            </div>
                <li class="md:ml-6 mt-3 md:mt-0 hover:text-gray-300 hover:underline">
                    <a href="/">{{auth()->user()->username}}</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 hover:text-gray-300 hover:underline">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button href="{{route('logout')}}" type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="md:ml-6 mt-3 md:mt-0 hover:text-gray-300 hover:underline">
                    <a href="{{route('login')}}">Login</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0 hover:text-gray-300 hover:underline">
                    <a href="{{route('register')}}">Register</a>
                </li>
            @endauth
        </ul>
        </div>
</nav>
@yield('content')
@livewireScripts
</body>
</html>
