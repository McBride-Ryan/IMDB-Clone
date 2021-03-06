<div class="relative mt-3 md:mt-0">
    <input wire:model="search" type="text" class="rounded-full w-64 px-4 py-1 pl-8 focus:outline-none focus:shadow-outline" style="color: #222" placeholder="Search IMDB...">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>
    @if(strlen($search >= 2))
        <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
            @if($searchResults->count() > 0)
                <ul>
                    @foreach($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{ route('movie', $result['id'])}}" class="block hover:bg-gray-700 flex items-center px-3 py-3">
                            <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster"
                            class="w-8">
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="block hover:bg-gray-700 px-3 py-3">No Show Results Found</div>
            @endif
        </div>
    @endif
</div>
