<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
     return view('sessions.create');   
    }

    public function store()
    {
        //validate the request in general
      $credentials =  request()->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required'
        ]);
        //attempt to authenticate and login the user
        //based on the provided credentials
        if(!Auth::attempt($credentials)){
             //auth failed method 2 
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
           
        }

         //against session fixation
            session()->regenerate();
            //redirect with flash messages
            return redirect('/')->with('success','Welcome Back!');

        //auth failed method 1
        // return back()
        // ->withInput()
        // ->withErrors(['email'=>'Your provided credentials could not be verified!']);

       
    }


    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
