<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Petugas;

class PetugasLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.petugas-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request,[
            'email' => ['required','email'],
            'password' => ['required','min:6'],
        ]);

        $credentials = $request->only('email','password');


        //Attempt to log the user in
        if(Auth::guard('petugas')->attempt($credentials))
        {
            //if succesful, then redirect to their intended locatin
            return redirect()->intended(route('petugas.dashboard'));
        }
        
        //if unsuccsesfull, the redirect back to login with form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
