@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 mt-8">
            <div class="px-4 py-6">
                <h1 class="text-2xl font-medium mb-4">{{$user->username}}</h1>
            </div>
            <div class="bg-gray-500 p-6 rounded-lg">
                @if($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
                    <span class="text-black">{{ $posts->links() }}</span>
                @else
                    <p class="text-black">{{$user->username}} does not have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
