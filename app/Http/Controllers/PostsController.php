<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // to stop any other user which are not logged in to reach the create page
    public function __construct()
    {
        // passing the auth key in a middleware
        $this->middleware('auth');
        // after creating this every other function of postscontroller will require logged in user
    }

    public function index()
    {
        // to get all user id will use user id in profiles table
        $users = auth()->user()->following()->pluck('profiles.user_id');
        // $posts = Post::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->get();
        $posts = Post::whereIn('user_id', $users)->latest()->get();
        // dd($posts);
        return view('posts.index', compact('posts'));
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
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

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

    public function show(\App\Post $post)
    {   
        return view('posts.show', compact('post'));
    }
}
