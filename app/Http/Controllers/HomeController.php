<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function doLogin(Request $request)
    {
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = $request->validate($rules);

        // create our user data for the authentication
        $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {
            $name = User::select('name')->where('email', $userdata['email'])->first()['name'];
            $request->session()->put('name', $name);
            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            return redirect('posts');
        } else {

            // validation not successful, send back to form
            return redirect('login');

        }

        return view('login');
    }
}
