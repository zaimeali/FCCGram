<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user) 
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($user);

        // dd($follows);
        
        // $user = User::find($user); // if user enter any other id which is not available in a db this will break the app
        // $user = User::findOrFail($user);  // if it will fail then it will redirect user to 404 page
        return view('profiles.index', [
            'user' => $user,
            'follows' => $follows, 
        ]);

        // if i pass 1 it will retrieve the data but when i pass any other number which is not stored
        //      it will show me the error.
        // dd(User::find($user));
        // return view('profiles.index', compact('user', 'follows'));
    }

    // we dont have to use \App\User just use User bcz we are importing it in above
    public function edit(User $user)
    {
        // authorizing through policy
        $this->authorize('update', $user->profile);
        // use findOrFail method or directly use \App\User in a arg
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        // authorizing through policy
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'url',
            'image'       => ''
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public'); 
        
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }
}
