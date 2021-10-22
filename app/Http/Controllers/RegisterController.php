<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');

    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required','max:255'],
            'username' => ['required','max:255','min:3', 'unique:users,username'],
            'email' => ['required','email','max:255', 'unique:users,email'],
            'password' => ['required','min:7', 'max:255']

        ]);
// Ways of to save the user object
    // First way
        //     User::create([
        //         'name' => $attributes['name'],
        //         'username' => $attributes['username'],
        //         'email' => $attributes['email'],
        //         'password' => bcrypt($attributes['password']),
        // ]);
    // End first way

    // // Second way
    //         $attributes['password'] = bcrypt($attributes['password']);

    //         User::create($attributes);

    // // End second way

    // Third way
            // User::create(request()->validate([
            //     'name' => ['required','max:255'],
            //     'username' => ['required','max:255','min:3'],
            //     'email' => ['required','email','max:255'],
            //     'password' => ['required','min:7', 'max:255']

            // ]));

    // End third way


// End ways to save user object
// Fourth way would be trhough Eloquent mutator. => in the User model
        $user = User::create($attributes); // The password is set(mutated in the User model 'SetPasswordAttribute' mutator function)
        auth()->login(user: $user);
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
