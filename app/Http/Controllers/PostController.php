<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(30);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body'=>'required'
        ]);

        $request->user()->posts()->create([
            'body'=> $request->body
        ]);
        return back();
    }
}
