@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-gray-500 p-6 rounded-lg mt-8">
            <form action="{{route('posts')}}" method="post" enctype="multipart/form-data" class="mb-4">
                @csrf
                <input type="file" name="image" class="items-center">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="my-4 text-gray-900 bg-gray-100 border-2 w-full p-4 rounded-lg
               @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <button class="bg-blue-500 hover:bg-blue-400 px-4 py-2 rounded font-medium" type="submit">
                    Post
                </button>
            </form>
            @if($posts->count())
                @foreach($posts as $post)
                    <a href="/" class="font-bold text-gray-900">{{$post->user->username}}</a>
                    <span class="text-sm text-gray-400">{{$post->created_at->diffForHumans()}}</span>

                    <p class="mb-4 text-gray-800">{{$post->body}}</p>
                @endforeach
                <span class="text-black">{{ $posts->links() }}</span>
            @else
                <p>There is no post</p>
            @endif
        </div>
    </div>

@endsection
