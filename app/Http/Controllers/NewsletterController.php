<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;
class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter)
    {
         request()->validate([ 'email'=>'required|email']);


        try {
            //code...
        // $newsletter = new Newsletter();
        $newsletter->subscribe(request('email'));

        } catch (\Exception $e) {
            //throw $th;
        throw ValidationException::withMessages([
                'email'=>'This email could not be added to our newsletter'
            ]);
        }


        return redirect('/')
            ->with('success','You are now signed up for our newsletter');
    }
}
