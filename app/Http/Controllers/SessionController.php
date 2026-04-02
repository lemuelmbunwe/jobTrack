<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        //validate
        $attributes = request()->validate([
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);

        // dd(request());
        //login user -- remember to modify the UI such that these error messages are passed when needed
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Credentials do not match'
            ]);
        }

        //regenerate token
        request()->session()->regenerate();

        //redirect
        return redirect('/applications');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
