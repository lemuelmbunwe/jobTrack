<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class RegisterUserController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        //validate 

        // dd(request());
        $attributes = request()->validate([
            'name' =>'required',
            'email' => ['required' , 'email'],
            'password' => ['required', Password::min(4), 'confirmed']
        ]);

        //store
        $user = User::create($attributes);

        //login user
        Auth::login($user);

        //redirect the user
        return redirect('/applications');
    }
}
