@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <di class="w-8/12 bg-gray-500 p-6 rounded-lg mt-8">
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
                    <a href="{{route('users.posts', $post->user)}}" class="font-bold text-gray-900">{{$post->user->username}}</a>
                    <span class="text-sm text-gray-400">{{$post->created_at->diffForHumans()}}</span>

                    <p class="text-gray-800">{{$post->body}}</p>

                    @can('delete', $post)
                        <form action="{{route('posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 mr-1">Delete</button>
                        </form>
                    @endcan

                    <div class="flex items-center mb-2">
                        @auth
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-400">Like</button>
                                </form>
                            @else
                                <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-400">Unlike</button>
                                </form>
                            @endif
                        @endauth
                        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
                    </div>
                @endforeach
                <span class="text-black">{{ $posts->links() }}</span>
            @else
                <p>There is no post</p>
            @endif
        </div>
    </div>

@endsection
