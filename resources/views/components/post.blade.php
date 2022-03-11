@props(['post' => $post])

<div class="mb-1">
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
</div>
