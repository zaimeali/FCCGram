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

        // path for image store and driver which is a second arg
        // uploads is a dir
        // public is a driver
        $imagePath = request('image')->store('uploads', 'public');  // go to storage/app/public/uploads you will find image here
        
        // dd(request('image')->store('uploads', 'public'));
        //  now you can view file through url
        // http://127.0.0.1:8000/storage/uploads/Y7kxkrXswVxluycHJ9zJyPoxv85qERJoE4ycCvOx.jpeg

        // laravel in a bts will add the user id for us bcz of posts function which is in a User model
        // auth()->user()->posts()->create($data);
        $arg = [
            'caption' => $data['caption'],
            'image'   => $imagePath,
        ];
        auth()->user()->posts()->create($arg);
        
        // dd(request()->all());
        return redirect('/profile/'. auth()->user()->id);
        // now here we are redirecting the user to its profile with the user id from the auth function
    }
}
