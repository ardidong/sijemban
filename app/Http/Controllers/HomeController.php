<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('donator')){
            return view('/home');
        }
        if($request->user()->hasRole('petugas')){
            return redirect()->intended(route('petugas.dashboard'));
        }
        if($request->user()->hasRole('admin')){
            return view('/admin');
        }
    }
}
