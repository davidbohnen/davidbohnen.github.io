<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        
        $data = request()->validate([
            'title' => 'required',
            'text' => 'required',

        ]);

        //$data['user_id']= auth()->user()->id;

        //$post = \App\Post::create($data);

        $post = auth()->user()-> post() ->create($data);

        return redirect('/post'.$post->id);
    }

    public function show(\App\Post $post){
        return view('post.show',compact('post'));
    }
}
