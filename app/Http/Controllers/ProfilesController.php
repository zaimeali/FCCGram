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
        return view('home', [
            'user' => $user,
        ]);
    }
}
