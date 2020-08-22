<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    // to stop any other user which are not logged in to reach the create page
    public function __construct()
    {
        // passing the auth key in a middleware
        $this->middleware('auth');
        // after creating this every other function of postscontroller will require logged in user
    }

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
