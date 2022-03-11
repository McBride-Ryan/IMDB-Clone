@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-8">
            <h1 class="text-black text-2xl">{{$user->username}}</h1>
        </div>
    </div>
@endsection
