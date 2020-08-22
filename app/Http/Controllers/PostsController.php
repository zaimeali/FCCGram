<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            // 'image'   => 'required|image' // another way
            'image'   => ['required', 'image'],
        ]);

        // laravel in a bts will add the user id for us bcz of posts function which is in a User model
        auth()->user()->posts()->create($data);
        
        dd(request()->all());
    }
}
