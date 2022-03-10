@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 font-semibold text-3xl">What to Watch</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            {{-- Loop over movies --}}
                @foreach($popularMovies as $el)
                    <div class="mt-8">
                        <a href="{{ route('movie', $el['id'])}}">
                            <img src="{{'https://image.tmdb.org/t/p/w500'.$el['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movie', $el['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$el['title']}}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                <span class="ml-1">{{$el['vote_average'] * 10}}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($el['release_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">
                                @foreach($el['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div> <!-- end pouplar-movies -->

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-3xl font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($nowPlayingMovies as $el)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w500'.$el['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg mt-2 hover:text-gray-300">{{$el['title']}}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                <span class="ml-1">{{$el['vote_average'] * 10}}%</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($el['release_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">
                                @foreach($el['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if(!$loop->last), @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end now-playing-movies -->
    </div>
@endsection
