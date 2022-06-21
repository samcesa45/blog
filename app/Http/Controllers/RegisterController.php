<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){

        
    
       $attributes = request()->validate([
            'username' => 'required|min:3|max:255|unique:users,username',
            'name' => ['required','max:255'],
            'email' => 'required|email|max:255|unique:users,email',
            'password' =>'required|min:7|max:10'
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
       $user = User::create($attributes);

       //login the user
       Auth::login($user);
        //flashing a message 
        // session()->flash('success','Your account has been created');
        return redirect('/')->with('success','Your account has been created');
    }
}
