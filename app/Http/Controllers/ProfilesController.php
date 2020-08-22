<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index($user) 
    {
        // dd($user);
        
        // $user = User::find($user); // if user enter any other id which is not available in a db this will break the app
        $user = User::findOrFail($user);  // if it will fail then it will redirect user to 404 page


        // if i pass 1 it will retrieve the data but when i pass any other number which is not stored
        //      it will show me the error.
        // dd(User::find($user));
        return view('profiles.index', [
            'user' => $user,
        ]);
    }

    // we dont have to use \App\User just use User bcz we are importing it in above
    public function edit(User $user)
    {
        // use findOrFail method or directly use \App\User in a arg
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title'       => 'required',
            'description' => 'required',
            'url'         => 'url',
            'image'       => ''
        ]);
        
        $user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
